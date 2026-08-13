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

    public function ChooseGoal (Request $request)
    {
        return view('user.onboarding.choose-daily-goal');
    }

    public function ChooseTest ()    
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
    public function Login (Request $request)
    {
        return view('user.auth.login');
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
    public function UserTestDashboard (Request $request)
    {
        return view('user.test-prep.dashboard');
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
