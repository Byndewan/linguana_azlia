<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HeroItems;
use App\Models\ClientsTable;
use App\Models\Service;
use App\Models\Process;
use App\Models\Testimonial;
use App\Models\Language;
use App\Models\LearningPath;
use App\Models\DailyGoal;
use App\Models\UserProgress;
use App\Models\User;
use App\Models\OnboardTempData;
use App\Models\Module;
use App\Models\SubModule;
use App\Models\Vocabulary;
use App\Models\PracticeQuiz;
use App\Models\FinalQuiz;
use App\Models\FinalQuizAttempt;
use App\Models\UserQuizHistory;
use App\Http\Middleware\EnsureOnboardToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Mail;        

class UserController extends Controller
{
    public function index()
    {
        $page_data = HeroItems::where('id', 1)->first();
        $clients = ClientsTable::orderBy('id', 'asc')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $processes = Process::orderBy('id', 'asc')->get();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        $languages = Language::orderBy('id', 'asc')->get();
        return view('user.index', compact('page_data', 'clients', 'services', 'processes', 'testimonials','languages'));
    }

    // onboarding
    private function onboardToken(Request $request): string
    {
        return $request->attributes->get(EnsureOnboardToken::COOKIE_NAME);
    }

    private function onboardTempData(Request $request): ?OnboardTempData
    {
        return OnboardTempData::where('token', $this->onboardToken($request))->first();
    }

    public function CancelOnboarding(Request $request)
    {
        $this->onboardTempData($request)?->delete();

        return redirect()->route('home');
    }

    public function ChooseLanguage ()
    {
        $languages = Language::orderBy('id', 'asc')->get();
        return view('user.onboarding.choose-language', compact('languages'));
    }

    public function PostChooseLanguage(Request $request)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id'
        ]);

        OnboardTempData::updateOrCreate(
            ['token' => $this->onboardToken($request)],
            ['onboarding_language_id' => $request->language_id]
        );

        return redirect()->route('choose-path');
    }

    public function ChoosePath (Request $request)
    {
        $tempData = $this->onboardTempData($request);

    if (!$tempData || !$tempData->onboarding_language_id) {
        return redirect()->route('choose-language');
    }

    $languageId = $tempData->onboarding_language_id;

    $generalPath = LearningPath::where('language_id', $languageId)->first();
    $testPrepModule = LearningPath::where('language_id', $languageId)
        ->where('type', 'test_prep')
        ->first();

    return view('user.onboarding.choose-path', compact('generalPath', 'testPrepModule'));
    }

    public function PostChoosePath(Request $request)
    {
        $tempData = $this->onboardTempData($request);

        if (!$tempData || !$tempData->onboarding_language_id) {
            return redirect()->route('choose-language');
        }

        $request->validate([
            'type' => 'required|in:general,test_prep'
        ]);

        $languageId = $tempData->onboarding_language_id;
        $selectedLearningPathId = null;

        if ($request->type === 'general') {
            $learningPath = LearningPath::where('language_id', $languageId)->first();
            
            if ($learningPath) {
                $selectedLearningPathId = $learningPath->id;
            }
        } elseif ($request->type === 'test_prep') {
            $testPrepModule = LearningPath::where('language_id', $languageId)
                ->where('type', 'test_prep')
                ->first();

            if ($testPrepModule) {
                $selectedLearningPathId = $testPrepModule->id; 
            }
        }

        $tempData->update([
            'type' => $request->type,
            'learning_path_id' => $selectedLearningPathId, 
        ]);

        return redirect()->route('choose-daily-goal');
    }
    public function ChooseGoal(Request $request)
    {
        $onboarding = $this->onboardTempData($request);

        if (!$onboarding?->type) {
            return redirect()->route('choose-path');
        }

        $goals = DailyGoal::where('type', $onboarding->type)
                        ->orderBy('target_time', 'asc')
                        ->get();

        return view('user.onboarding.choose-daily-goal', compact('goals'));
    }

    public function PostChooseGoal (Request $request)
    {
        $request->validate([
            'daily_goal' => 'required|integer'
        ]);

        OnboardTempData::updateOrCreate(
            ['token' => $this->onboardToken($request)],
            ['daily_goal' => $request->daily_goal]
        );

        return redirect()->route('user.sign-up');
    }

    // public function ChooseTest (Request $request)
    // {
    //     $onboarding = $this->onboardTempData($request);

    //     $tests = LearningPath::where('language_id', $onboarding?->onboarding_language_id)->where('type', 'test_prep')->get();
    //     return view('user.onboarding.choose-test', compact('tests'));
    // }

    // public function PostChooseTest(Request $request)
    // {
    //     $request->validate([
    //         'learning_path_id' => 'required|exists:learning_paths,id'
    //     ]);

    //     OnboardTempData::updateOrCreate(
    //         ['token' => $this->onboardToken($request)],
    //         ['learning_path_id' => $request->learning_path_id]
    //     );

    //     return redirect()->route('choose-daily-goal');
    // }

    // auth
    public function SignUp()
    {
        return view('user.auth.signup');
    }
    public function SignUpSubmit (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $onboarding = $this->onboardTempData($request);

        $learning_path = $onboarding?->type;
        $language = $onboarding?->onboarding_language_id;
        $pathId = $onboarding?->learning_path_id;
        $dailyGoal = $onboarding?->daily_goal;

        if (empty($pathId) && $learning_path === 'general') {
            
            $defaultPath = LearningPath::where('language_id', $language)
                                                ->where('type', 'general')
                                                ->first();
            
            if ($defaultPath) {
                $pathId = $defaultPath->id;
            }
        }

        UserProgress::create([
            'user_id' => $user->id,
            'language_id' => $language,
            'learning_type' => $learning_path,
            'learning_path_id' => $pathId, 
            'daily_goal' => $dailyGoal,
        ]);

        $onboarding?->delete();

        Auth::login($user);

        $user->is_active = 1;
        $user->save();

        if ($learning_path === 'test_prep') {
            return redirect()->route('user.test-prep.dashboard');
        } else {
            return redirect()->route('user.general.dashboard');
        }
    }
    public function Login()
    {
        return view('user.auth.login');
}
    public function LoginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            $user->is_active = 1;
            $user->save();

            $request->session()->regenerate();
            $userProgress = UserProgress::where('user_id', Auth::id())->first();

            if ($userProgress && $userProgress->learning_type === 'test_prep') {
                return redirect()->route('user.test-prep.dashboard');
            } 
            
            return redirect()->route('user.general.dashboard');
        }

        return back()->with('error', 'Login failed. The email or password you entered is incorrect.')->withInput($request->only('email'));
    }

    public function Logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->is_active = 0; 
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function ForgotPassword()
    {
        return view('user.auth.forgot-password');
    }
    public function ForgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
        ]);

        $data = User::where('email', $request->email)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        $token = hash('sha256', time());

        $data->token = $token;
        $data->update();

        $reset_link = url('/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please check on the following link : <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->input('email'))->send(new Websitemail($subject, $message));

        return redirect()->route('user.login')->with('success', 'Please check your email and follow the steps there');
    }
    public function ResetPassword(string $token, string $email)
    {
        $data = User::where('token', $token)->where('email', $email)->first();

        if (!$data) {
            return redirect()->route('user.login')->with('error', 'Token or email not valid');
        }

        return view('user.auth.reset-password', compact('token', 'email'));
    }

    public function ResetPasswordSubmit(Request $request)
    {
        $request->validate([ 
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $data = User::where('token', $request->token)->where('email', $request->email)->first();

        if (!$data) {
            return redirect()->route('user.login')->with('error', 'Token or email not valid');
        }

        $data->password = Hash::make($request->password);
        $data->token = ''; 
        $data->update();

        return redirect()->route('user.login')->with('success', 'Password is reset successfully');
    }

    // general 
    public function UserGeneralDashboard()
    {   
        $user = Auth::user(); 
        $progress = UserProgress::with('module.rLearningPath.rLanguage')->where('user_id', $user->id)->first();
        $currentLanguage = ($progress && $progress->language_id) ? Language::find($progress->language_id) : null;

        $learningModules = [];
        $activeModule = null;

        if ($progress && $progress->learning_path_id) {
            $pathId = $progress->learning_path_id;

            $modules = Module::where('learning_path_id', $pathId)
                ->withCount('subModules')           
                ->withSum('subModules', 'time')  
                ->with(['subModules' => function($q) {
                    $q->orderBy('order_number', 'asc');
                }])
                ->get();

            $passingGrade = 70;

            foreach ($modules as $module) {
                $subModuleIds = $module->subModules->pluck('id');

                $highestScores = UserQuizHistory::where('user_id', $user->id)
                    ->whereIn('sub_module_id', $subModuleIds)
                    ->selectRaw('sub_module_id, MAX(score) as max_score')
                    ->groupBy('sub_module_id')
                    ->pluck('max_score', 'sub_module_id');

                $completedCount = 0;
                $currentActiveSubModule = null;
                $isPreviousPassed = true;

                foreach ($module->subModules as $subModule) {
                    $score = $highestScores[$subModule->id] ?? 0;

                    if ($score >= $passingGrade) {
                        $completedCount++;
                    } else {
                        if (!$currentActiveSubModule && $isPreviousPassed) {
                            $currentActiveSubModule = $subModule;
                        }
                    }

                    $isPreviousPassed = ($score >= $passingGrade);
                }

                $totalSubModules = $module->sub_modules_count;
                $percentage = $totalSubModules > 0 ? round(($completedCount / $totalSubModules) * 100) : 0;

                $module->completed_count = $completedCount;
                $module->progress_percentage = $percentage;
                $module->current_active_sub = $currentActiveSubModule;

                if ($percentage < 100 && !$activeModule) {
                    $activeModule = $module;
                }

                if ($percentage < 100) {
                    $learningModules[] = $module;
                }
            }

            $learningModules = array_slice($learningModules, 0, 2);
        }

        return view('user.general.dashboard', compact(
            'user', 
            'progress', 
            'currentLanguage', 
            'activeModule', 
            'learningModules'
        ));
    }

    public function UserGeneralModule()
    {
        $user = Auth::user();
        $progress = UserProgress::where('user_id', $user->id)->first();

        if (!$progress) {
            return view('user.general.module', [
                'modules' => [], 
                'pathTitle' => 'No Path Selected',
                'totalXpOverall' => 0,
                'wordsMasteredOverall' => 0
            ]);
        }

        $pathId = $progress->learning_path_id;

        $path = LearningPath::find($pathId);
        $pathTitle = $path ? $path->title : 'Your Modules';

        $modules = Module::where('learning_path_id', $pathId)
            ->withCount('subModules')          
            ->withSum('subModules', 'time')  
            ->with('subModules') 
            ->get();

        $passingGrade = 70;
        
        $quizXpOverall = UserQuizHistory::where('user_id', $user->id)->sum('xp_earned');
        $finalQuizXpOverall = FinalQuizAttempt::where('user_id', $user->id)->sum('xp_earned');
        $totalXpOverall = $quizXpOverall + $finalQuizXpOverall;

        $completedSubModuleIdsOverall = [];

        foreach ($modules as $module) {
            $subModuleIds = $module->subModules->pluck('id');

            $highestScores = UserQuizHistory::where('user_id', $user->id)
                ->whereIn('sub_module_id', $subModuleIds)
                ->selectRaw('sub_module_id, MAX(score) as max_score')
                ->groupBy('sub_module_id')
                ->get()
                ->keyBy('sub_module_id');

            $completedCount = 0;

            foreach ($module->subModules as $subModule) {
                $history = $highestScores[$subModule->id] ?? null;
                $score = $history ? $history->max_score : 0;

                if ($score >= $passingGrade) {
                    $completedCount++;
                    $completedSubModuleIdsOverall[] = $subModule->id;
                }
            }

            $totalSubModules = $module->sub_modules_count;
            $percentage = $totalSubModules > 0 ? round(($completedCount / $totalSubModules) * 100) : 0;

            $module->completed_count = $completedCount;
            $module->progress_percentage = $percentage;
        }

        $wordsMasteredOverall = Vocabulary::whereIn('sub_module_id', array_unique($completedSubModuleIdsOverall))->count();

        return view('user.general.module', compact(
            'modules', 
            'pathTitle', 
            'totalXpOverall', 
            'wordsMasteredOverall'
        ));
    }

    public function UserGeneralSubModule($id)
    {
        $module = Module::withCount('subModules')            
            ->withSum('subModules', 'point')                
            ->withSum('subModules', 'time')                 
            ->with(['subModules' => function ($query) {
                $query->orderBy('order_number', 'asc'); 
            }])
            ->findOrFail($id);

        $totalQuestions = FinalQuiz::where('module_id', $module->id)->count();

        $subModuleIds = $module->subModules->pluck('id');

        $vocabularies = Vocabulary::whereIn('sub_module_id', $subModuleIds)->get();

        $userId = Auth::id(); 

        $highestScores = UserQuizHistory::where('user_id', $userId)
            ->whereIn('sub_module_id', $subModuleIds)
            ->selectRaw('sub_module_id, MAX(score) as max_score')
            ->groupBy('sub_module_id')
            ->pluck('max_score', 'sub_module_id');

        $passingGrade = 70; 
        $isPreviousPassed = true; 

        $completedLessonsCount = 0;
        $totalScores = 0;
        $gradedCount = 0;
        $totalXpEarned = 0; 

        foreach ($module->subModules as $subModule) {
            $score = $highestScores[$subModule->id] ?? 0;
            $subModule->highest_score = $score; 

            if (!$isPreviousPassed) {
                $subModule->status = 'locked';
            } else {
                if ($score >= $passingGrade) {
                    $subModule->status = 'completed'; 
                    $completedLessonsCount++; 
                    
                    $totalScores += $score;
                    $gradedCount++;

                    $totalXpEarned += $subModule->point ?? 0;
                } else {
                    $subModule->status = 'unlocked';  
                }
            }

            $isPreviousPassed = ($score >= $passingGrade);
        }

        $totalLessons = $module->sub_modules_count;
        $lessonsDoneText = "{$completedLessonsCount} / {$totalLessons}";

        $moduleProgress = $totalLessons > 0 ? round(($completedLessonsCount / $totalLessons) * 100) : 0;

        if ($moduleProgress == 100) {
            $totalXpEarned += $module->point ?? 0;
        }

        $completedSubModuleIds = $module->subModules->filter(function($sub) {
            return $sub->status === 'completed';
        })->pluck('id');
        
        $vocabLearn = Vocabulary::whereIn('sub_module_id', $completedSubModuleIds)->count();

        $quizScoreAvg = $gradedCount > 0 ? round($totalScores / $gradedCount) : null;

        return view('user.general.sub-module', compact(
            'module', 
            'vocabularies', 
            'totalQuestions', 
            'completedLessonsCount', 
            'totalLessons', 
            'moduleProgress', 
            'vocabLearn', 
            'quizScoreAvg',
            'totalXpEarned' 
        ));
    }

    public function UserShowQuiz($sub_module_id)
    {
        $quizItems = PracticeQuiz::where('sub_module_id', $sub_module_id)
                ->orderBy('order_number', 'asc')
                ->get();

        if ($quizItems->isEmpty()) {
            return redirect()->back()->with('error', "We don't have material yet");
        }

        return view('user.general.practice_quiz', compact('quizItems'));
    }
    
    public function UserShowQuizResult($sub_module_id)
    {
        $resultData = session('quiz_result_data');

        if (!$resultData) {
            return redirect()->route('user.general.dashboard')->with('error', 'Silakan kerjakan kuis terlebih dahulu.');
        }

        $subModule = SubModule::findOrFail($sub_module_id);

        return view('user.general.quiz_result_practice', [ 
            'score'   => $resultData['score'],
            'correct' => $resultData['correct'],
            'total'   => $resultData['total'],
            'xp'      => $resultData['xp'],
            'sub_module_id' => $sub_module_id,
            'module_id'     => $subModule->module_id
        ]);
    }

    public function UserShowQuizSubmit(Request $request)
    {
        $request->validate([
            'sub_module_id' => 'required',
            'total_correct' => 'required|numeric',
            'total_quizzes' => 'required|numeric',
        ]);

        $score = ($request->total_correct / $request->total_quizzes) * 100;

        $subModule = SubModule::findOrFail($request->sub_module_id);
        $realPoint = $subModule->point; 

        UserQuizHistory::create([
            'user_id'         => $request->user()->id, 
            'sub_module_id'   => $request->sub_module_id,
            'score'           => $score,
            'total_correct'   => $request->total_correct,
            'total_questions' => $request->total_quizzes,
            'xp_earned'       => $realPoint,
        ]);
        
        session([
            'quiz_result_data' => [
                'score'   => round($score),
                'correct' => $request->total_correct,
                'total'   => $request->total_quizzes,
                'xp'      => $realPoint,
            ]
        ]);

        return response()->json([
            'success'      => true,
            'redirect_url' => route('user.general.quiz.result', ['sub_module_id' => $request->sub_module_id])
        ]);
    }

    public function UserGeneralFlashcard($sub_module_id)
    {
        $vocabularies = Vocabulary::where('sub_module_id', $sub_module_id)->get();

        if ($vocabularies->isEmpty()) {
            return redirect()->back()->with('error', 'Flashcard belum tersedia untuk materi ini.');
        }
        return view('user.general.flashcard', compact('vocabularies', 'sub_module_id'));
    }

    public function UserGeneralListenAndSelect (Request $request)
    {
        return view('user.general.listen_and_select');
    }

    public function UserGeneralListenAndType (Request $request)
    {
        return view('user.general.listen_and_type');
    }

    public function UserGeneralFillBlankMC (Request $request)
    {
        return view('user.general.fill_blank_mc');
    }
    public function UserGeneralFillBlankInput (Request $request)
    {
        return view('user.general.fill_blank_input');
    }
    public function UserFinalQuiz($module_id)
    {
        $user_id = Auth::id();

        $subModuleIds = SubModule::where('module_id', $module_id)->pluck('id');

        $completedCount = UserQuizHistory::where('user_id', $user_id)
                            ->whereIn('sub_module_id', $subModuleIds)
                            ->distinct('sub_module_id')
                            ->count();

        if ($completedCount < $subModuleIds->count()) {
            return redirect()->back()->with('error', 'You need to finished all the quiz before move to the Final Quiz');
        }

        $module = Module::findOrFail($module_id);
        $finalQuizzes = FinalQuiz::where('module_id', $module_id)->get();

        return view('user.general.final-quiz', compact('module', 'finalQuizzes'));
    }

    public function UserFinalQuizSubmit(Request $request, $module_id)
    {
        $module = Module::findOrFail($module_id);
        $questions = FinalQuiz::where('module_id', $module_id)->get();
        
        $userAnswers = $request->input('answers', []);
        $totalQuestions = $questions->count();
        $correctCount = 0;

        foreach ($questions as $index => $question) {
            $userAns = $userAnswers[$index] ?? null;
            
            if ($userAns !== null && trim(strtolower($userAns)) === trim(strtolower($question->correct_answer))) {
                $correctCount++;
            }
        }

        $score = $totalQuestions > 0 ? ($correctCount / $totalQuestions) * 100 : 0;
        $status = $score >= 75 ? 'passed' : 'failed'; 

        $xpEarned = round(($score / 100) * ($module->point ?? 0));

        $attempt = FinalQuizAttempt::create([
            'user_id'         => Auth::id(),
            'module_id'       => $module_id,
            'score'           => round($score, 2),
            'total_correct'   => $correctCount,
            'status'          => $status,
            'xp_earned'       => $xpEarned, 
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Quiz submitted successfully!',
            'redirect_url' => route('user.general.quiz-result', ['module_id' => $module_id, 'attempt' => $attempt->id])
        ]);
    }

    public function UserQuizResult($module_id, $attempt_id)
    {
        $module = Module::findOrFail($module_id);

        $totalQuestions = FinalQuiz::where('module_id', $module->id)->count();
    
        $attempt = FinalQuizAttempt::where('id', $attempt_id)
                                    ->where('user_id', Auth::id())
                                    ->firstOrFail();

        $earnedXp = $attempt->point;

        return view('user.general.quiz-result-final', [ 
            'score'     => $attempt->score,
            'correct'   => $attempt->total_correct,
            'total'     => $totalQuestions,
            'status'    => $attempt->status,
            'module'    => $module,
            'module_xp' => $module->point
        ]);
    }
    public function UserProfile (Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $quizXp = UserQuizHistory::where('user_id', $userId)->sum('xp_earned');
        $finalQuizXp = FinalQuizAttempt::where('user_id', $userId)->sum('xp_earned');
        $totalXp = $quizXp + $finalQuizXp;

        $quizPassed = UserQuizHistory::where('user_id', $userId)->count();

        $modulesDone = FinalQuizAttempt::where('user_id', $userId)
                                    ->where('status', 'passed')
                                    ->count();

        $completedSubModules = UserQuizHistory::where('user_id', $userId)
                                            ->pluck('sub_module_id');
                                            
        $wordsLearned = Vocabulary::whereIn('sub_module_id', $completedSubModules)->count(); 

        $progress = UserProgress::where('user_id', $userId)->first();

        // $languageName = 'Not Set';
        // if ($progress && $progress->language_id) {
        //     $language = Language::find($progress->language_id);
        //     $languageName = $language ? $language->name : 'Not Set';
        // }

        // $pathTitle = 'General Learning';
        // if ($progress && $progress->learning_path_id) {
        //     $path = LearningPath::find($progress->learning_path_id);
        //     $pathTitle = $path ? $path->title : 'General Learning';
        // }

        return view('user.general.profile', compact(
            'user', 
            'totalXp', 
            'quizPassed', 
            'modulesDone', 
            'wordsLearned',
            'progress'
        ));
    }


    public function UserEditProfile()
    {
        $user = Auth::guard('user')->user();
        return view('user.general.edit_profile', compact('user'));
    }

    public function UserEditProfileSubmit(Request $request)
    {
        $user_data = Auth::user();

        if (!$user_data) {
            return redirect()->route('user.login')->with('error', 'Your session has expired. Please log in again.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_data->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' 
        ]);

        $user_data->name = $request->name;
        $user_data->email = $request->email;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ext = $photo->extension();
            
            $final_name = 'user_' . $user_data->id . '_' . time() . '.' . $ext;

            if ($user_data->photo && file_exists(public_path('uploads/' . $user_data->photo))) {
                unlink(public_path('uploads/' . $user_data->photo));
            }

            $photo->move(public_path('uploads/'), $final_name);

            $user_data->photo = $final_name;
        }

        $user_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully!');
    }

    public function UserChangePassword()
    {
        return view('user.general.change_password');
    }

    public function UserUpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed', 
        ], [
            'current_password.required' => 'The current password field is required.',
            'password.required' => 'The new password field is required.',
            'password.min' => 'The new password must be at least 8 characters.',
            'password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'The current password you entered is incorrect!');
        }

        $user->password = Hash::make($request->password);
        $user->update();

        return back()->with('success', 'Password updated successfully!');
    }

    // Test Prep
    public function UserTestDashboard()
    {
        $userId = Auth::id();
        $progress = UserProgress::where('user_id', $userId)->first();
        $testData = LearningPath::find($progress->learning_path_id);

        return view('user.test-prep.dashboard', compact('testData'));
    }

    public function UserTestProfile (Request $request)
    {
        return view('user.test-prep.profile');
    }
    public function UserTestModule (Request $request)
    {
        return view('user.test-prep.module');
    }
    public function UserTestReadingModule (Request $request)
    {
        return view('user.test-prep.reading');
    }
    public function UserTestListeningModule (Request $request)
    {
        return view('user.test-prep.listening');
    }
    public function UserTestSpeakingModule (Request $request)
    {
        return view('user.test-prep.speaking');
    }
    public function UserTestWritingModule (Request $request)
    {
        return view('user.test-prep.writing');
    }
    public function UserVideoLesson (Request $request)
    {
        return view('user.test-prep.video-lesson');
    }
    public function UserFullMockTest (Request $request)
    {
        return view('user.test-prep.full-mock-test');
    }
    public function UserFullMockTestResult (Request $request)
    {
        return view('user.test-prep.full-mock-test-score');
    }
}
