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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        session(['onboarding_language_id' => $request->language_id]);

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

        session(['type' => $request->type]);

        if ($request->type == 'test_prep') {
            return redirect()->route('choose-test');
        } else {
            return redirect()->route('choose-daily-goal');
        }
        
    }
    public function ChooseGoal()
    {
        if (!session()->has('type')) {
            return redirect()->route('choose-path');
        }

        $learning_path = session('type'); 
        
        $goals = DailyGoal::where('type', $learning_path)
                        ->orderBy('target_time', 'asc')
                        ->get();
                        
        return view('user.onboarding.choose-daily-goal', compact('goals'));
    }

    public function PostChooseGoal (Request $request)
    {
        $request->validate([
            'daily_goal' => 'required|integer'
        ]);

        session(['daily_goal' => $request->daily_goal]);

        return redirect()->route('user.sign-up');
    }

    public function ChooseTest()    
    {
        $tests = LearningPath::where('language_id', session('onboarding_language_id'))->where('type', 'test_prep')->get();
        return view('user.onboarding.choose-test', compact('tests'));
    }

    public function PostChooseTest(Request $request)
    {
        $request->validate([
            'learning_path_id' => 'required|exists:learning_paths,id'
        ]);

        session(['learning_path_id' => $request->learning_path_id]);

        return redirect()->route('choose-daily-goal');
    }

    // auth
    public function SignUp (Request $request)
    {
        return view('user.auth.signup');
    }
    public function SignUpSubmit (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $learning_path = session('type'); 
        $language = session('onboarding_language_id');
        $pathId = session('learning_path_id'); 
        $dailyGoal = session('daily_goal');

        UserProgress::create([
            'user_id' => $user->id,
            'language_id' => $language,
            'learning_type' => $learning_path,
            'learning_path_id' => $pathId, 
            'daily_goal' => $dailyGoal,
        ]);

        session()->forget(['onboarding_language_id', 'type', 'learning_path_id', 'daily_goal']);

        Auth::login($user);

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
        return view('user.auth.login');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function ForgotPassword (Request $request)
    {
        return view('user.auth.forgot-password');
    }
    public function ResetPassword (Request $request)
    {
        return view('user.auth.reset-password');
    }

    // general 
    public function UserGeneralDashboard (Request $request)
    {
        return view('user.general.dashboard');
    }
    public function UserGeneralModule (Request $request)
    {
        return view('user.general.module');
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
