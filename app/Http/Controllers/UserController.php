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
        return view('user.index', compact('page_data', 'clients', 'services', 'processes', 'testimonials'));
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

    public function ChoosePath ()
    {
        return view('user.onboarding.choose-path');
    }

    public function PostChoosePath(Request $request)
    {
        $request->validate([
            'type' => 'required|in:general,test_prep'
        ]);

        OnboardTempData::updateOrCreate(
            ['token' => $this->onboardToken($request)],
            ['type' => $request->type]
        );

        if ($request->type == 'test_prep') {
            return redirect()->route('choose-test');
        } else {
            return redirect()->route('choose-daily-goal');
        }
        
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

    public function ChooseTest (Request $request)
    {
        $onboarding = $this->onboardTempData($request);

        $tests = LearningPath::where('language_id', $onboarding?->onboarding_language_id)->where('type', 'test_prep')->get();
        return view('user.onboarding.choose-test', compact('tests'));
    }

    public function PostChooseTest(Request $request)
    {
        $request->validate([
            'learning_path_id' => 'required|exists:learning_paths,id'
        ]);

        OnboardTempData::updateOrCreate(
            ['token' => $this->onboardToken($request)],
            ['learning_path_id' => $request->learning_path_id]
        );

        return redirect()->route('choose-daily-goal');
    }

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
        return redirect('/');
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
        $progress = UserProgress::where('user_id', $user->id)->first();
        return view('user.general.dashboard', compact('user','progress'));
    }
    public function UserGeneralModule()
    {
        $user = Auth::user();
        $progress = UserProgress::where('user_id', $user->id)->first();

        if (!$progress) {
            return view('user.dashboard.general', [
                'modules' => [], 
                'pathTitle' => 'No Path Selected'
            ]);
        }

        $pathId = $progress->learning_path_id;

        $path = LearningPath::find($pathId);
        $pathTitle = $path ? $path->title : 'Your Modules';

        $modules = Module::where('learning_path_id', $pathId)
            ->withCount('subModules')        
            ->withSum('subModules', 'time')  
            ->get();

        return view('user.general.module', compact('modules'));
    }
    public function UserGeneralSubModule ($id)
    {
        $module = Module::withCount('subModules')             
        ->withSum('subModules', 'point')                 
        ->withSum('subModules', 'time')                   
        ->with(['subModules' => function ($query) {
            $query->orderBy('order_number', 'asc'); 
        }])
        ->findOrFail($id);

        return view('user.general.sub-module', compact('module'));
    }
    public function UserGeneralFlashcard (Request $request)
    {
        return view('user.general.flashcard');
    }
    public function UserFinalQuiz (Request $request)
    {
        return view('user.general.final-quiz');
    }
    public function UserQuizResult (Request $request)
    {
        return view('user.general.quiz-result');
    }
    public function UserProfile (Request $request)
    {
        return view('user.general.profile');
    }

    // Test Prep
    public function UserTestDashboard()
    {
        $userId = Auth::id();
        $progress = UserProgress::where('user_id', $userId)->first();
        $testData = LearningPath::find($progress->learning_path_id);

        return view('user.test-prep.dashboard', compact('testData'));
    }
    public function UserTestModule (Request $request)
    {
        return view('user.test-prep.module');
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
