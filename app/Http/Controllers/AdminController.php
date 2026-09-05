<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HeroItems;
use App\Models\ClientsTable;
use App\Models\Service;
use App\Models\Process;
use App\Models\Testimonial;
use App\Models\Language;
use App\Models\LearningPath;
use App\Models\DailyGoal;
use App\Models\User;
use App\Models\Module;
use App\Models\SubModule;
use App\Models\Vocabulary;
use App\Models\PracticeQuiz;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process as FacadesProcess;

class AdminController extends Controller
{
    public function AdminDashboard (Request $request)
    {
        return view('admin.dashboard');
    }

    // Authentication
    public function AdminLogin (Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }
    public function AdminLoginSubmit (Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        Auth::guard('admin');

        if(Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin.dashboard');
        } else {    
            return redirect()->route('admin.login')->with('error', 'Information is not correct!');
        }
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function AdminForgotPassword()
    {
        return view('admin.auth.forgot-password');
    }
    public function AdminForgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        $token = hash('sha256', time());

        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please check on the following link : <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->input('email'))->send(new Websitemail($subject, $message));

        return redirect()->route('admin.login')->with('success', 'Please check your email and follow the steps there');
    }
    
    public function AdminResetPassword(string $token, string $email)
    {
        $admin_data = Admin::where('token', $token)->where('email', $email)->first();

        if (!$admin_data) {
            return redirect()->route('admin.login')->with('error', 'Token or email not valid');
        }

        return view('admin.auth.reset-password', compact('token', 'email'));
    }

    public function AdminResetPasswordSubmit(Request $request)
    {
        $request->validate([ 
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();

        if (!$admin_data) {
            return redirect()->route('admin.login')->with('error', 'Token or email not valid');
        }

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = ''; 
        $admin_data->update();

        return redirect()->route('admin.login')->with('success', 'Password is reset successfully');
    }

    // Profile
    public function AdminProfile()
    {
        return view('admin.profile');
    }
    public function AdminProfileSubmit(Request $request)
    {
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->password!='') {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png'
            ]);

            unlink(public_path('uploads/' . $admin_data->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $admin_data->photo = $final_name;
        }

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile information is saved succesfully!');
    }

    // Hero Items
    public function AdminHeroItems()
    {
        $page_data = HeroItems::where('id', 1)->first();
        return view('admin.hero_items', compact('page_data'));
    }
    public function AdminHeroItemsSubmit(Request $request)
    {
        $page_data = HeroItems::where('id', 1)->first();

        $request->validate([
            'hero_title' => 'required',
            'hero_description' => 'required',
            'hero_button_text' => 'required',
        ]);

        if($request->hasFile('hero_photo')) {
            $request->validate([
                'hero_photo' => 'image|mimes:jpg,jpeg,png'
            ]);

            unlink(public_path('uploads/' . $page_data->hero_photo));

            $ext = $request->file('hero_photo')->extension();
            $final_name = 'hero_photo'.'.'.$ext;

            $request->file('hero_photo')->move(public_path('uploads/'), $final_name);

            $page_data->hero_photo = $final_name;
        }

        $page_data->hero_title = $request->hero_title;
        $page_data->hero_description = $request->hero_description;
        $page_data->hero_button_text = $request->hero_button_text;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully');
    }

    // Clients
    public function AdminClientShow()
    {
        $all_data = ClientsTable::orderBy('id', 'asc')->get();
        return view('admin.clients_show', compact('all_data'));
    }

    public function AdminClientSubmit(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $obj = new ClientsTable();

        $ext = $request->file('photo')->extension();
        $final_name = 'client_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $obj->photo = $final_name;

        $obj->save();

        return redirect()->back()->with('success', 'Data is inserted successfully!');
    }

    public function AdminClientDelete(int $id)
        {
            $row_data = ClientsTable::where('id', $id)->first();
            
            $image_path = public_path('uploads/' . $row_data->photo);
            
            if(file_exists($image_path) && is_file($image_path)){
                unlink($image_path);
            }

            $row_data->delete();

            return redirect()->back()->with('success', 'Data is deleted successfully!');
        }

    // Service
    public function AdminServiceShow()
    {
        $all_data = Service::orderBy('id', 'asc')->get();
        return view('admin.service', compact('all_data'));
    }

    public function AdminServiceAdd()
    {
        return view('admin.service_add');
    }
    public function AdminServiceSubmit(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'color' => 'required|string|max:7',
            'background_color' => 'required|string|max:7',
        ]);

        $obj = new Service();

        $obj->service_name = $request->service_name;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->background_color = $request->background_color;
        $obj->save();

        return redirect()->route('admin.service.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminServiceEdit(int $id)
    {
        $row_data = Service::where('id', $id)->first();
        return view('admin.service_edit', compact('row_data'));
    }
    public function AdminServiceUpdate(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'color' => 'required|string|max:7',
            'background_color' => 'required|string|max:7',
        ]);

        $obj = Service::where('id', $id)->first();

        $obj->service_name = $request->service_name;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->background_color = $request->background_color;
        $obj->update();

        return redirect()->route('admin.service.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminServiceDelete(Request $request, $id)
    {
        $row_data = Service::where('id', $id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Process
    public function AdminProcessShow()
    {
        $all_data = Process::orderBy('id', 'asc')->get();
        return view('admin.process_show', compact('all_data'));
    }

    public function AdminProcessAdd()
    {
        return view('admin.process_add');
    }

    public function AdminProcessSubmit(Request $request)
    {
        $request->validate([
            'process' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'color' => 'required|string|max:7',
        ]);

        $obj = new Process();

        $obj->process = $request->process;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->save();

        return redirect()->route('admin.process.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminProcessEdit(int $id)
    {
        $row_data = Process::where('id', $id)->first();
        return view('admin.process_edit', compact('row_data'));
    }
    public function AdminProcessUpdate(Request $request, $id)
    {
        $request->validate([
            'process' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'color' => 'required|string|max:7',
        ]);

        $obj = Process::where('id', $id)->first();

        $obj->process = $request->process;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->update();

        return redirect()->route('admin.process.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminProcessDelete(Request $request, $id)
    {
        $row_data = Process::where('id', $id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Testimonial

    public function AdminTestimonialShow()
    {
        $all_data = Testimonial::orderBy('id', 'asc')->get();
        return view('admin.testimonial_show', compact('all_data'));
    }

    public function AdminTestimonialAdd()
    {   
        return view('admin.testimonial_add');
    }

    public function AdminTestimonialSubmit(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        $obj = new Testimonial();

        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $obj->photo = $final_name;

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->rating = $request->rating;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin.testimonial.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminTestimonialEdit(int $id)
    {
        $row_data = Testimonial::where('id', $id)->first();
        return view('admin.testimonial_edit', compact('row_data'));
    }
    public function AdminTestimonialUpdate(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        $obj = Testimonial::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png'
            ]);

            unlink(public_path('uploads/' . $obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->rating = $request->rating;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->route('admin.testimonial.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminTestimonialDelete(Request $request, $id)
    {
        $row_data = Testimonial::findOrFail($id);

        $image_path = public_path('uploads/'.$row_data->photo);
    
        if (!empty($row_data->photo) && file_exists($image_path)) {
            unlink($image_path);
        }
        
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Language
    public function AdminLanguageShow()
    {   
        $all_data = Language::orderBy('id', 'asc')->get();
        return view('admin.language_show', compact('all_data'));
    }

    public function AdminLanguageAdd()
    {   
        return view('admin.language_add');
    }

    public function AdminLanguageSubmit(Request $request)
    {
        $request->validate([
            'flag' => 'required|mimes:jpg,jpeg,png',
            'language' => 'required',
        ]);

        $obj = new Language();

        $ext = $request->file('flag')->extension();
        $final_name = 'flag_' . time() . '.' . $ext;
        $request->file('flag')->move(public_path('uploads/'), $final_name);
        $obj->flag = $final_name;

        $obj->language = $request->language;
        $obj->save();

        return redirect()->route('admin.language.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminLanguageEdit(int $id)
    {
        $row_data = Language::where('id', $id)->first();
        return view('admin.language_edit', compact('row_data'));
    }
    public function AdminLanguageUpdate(Request $request, $id)
    {
        $request->validate([
            'flag' => 'required|mimes:jpg,jpeg,png',
            'language' => 'required',
        ]);

        $obj = Language::where('id', $id)->first();

        if($request->hasFile('flag')) {
            $request->validate([
                'flag' => 'image|mimes:jpg,jpeg,png'
            ]);

            unlink(public_path('uploads/' . $obj->flag));

            $ext = $request->file('flag')->extension();
            $final_name = 'flag_' . time() . '.' . $ext;

            $request->file('flag')->move(public_path('uploads/'), $final_name);

            $obj->flag = $final_name;
        }

        $obj->language = $request->language;
        $obj->update();

        return redirect()->route('admin.language.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminLanguageDelete(Request $request, $id)
    {
        $row_data = Language::findOrFail($id);

        $image_path = public_path('uploads/'.$row_data->flag);
    
        if (!empty($row_data->flag) && file_exists($image_path)) {
            unlink($image_path);
        }
        
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Learning Path 
    public function AdminLearningPathShow()
    {
        $all_data = LearningPath::with('rLanguage')->orderBy('id', 'asc')->get();
        return view('admin.learning_path_show', compact('all_data'));
    }

    public function AdminLearningPathAdd()
    {
        $languages = Language::get();
        return view('admin.learning_path_add', compact('languages'));
    }

    public function AdminLearningPathSubmit(Request $request)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'type' => 'required|in:general,test_prep',
            'title'       => 'required|string|max:255',
            'short_description' => 'required',
        ]);

        $obj = new LearningPath();

        if ($request->hasFile('photo')) {
            $ext = $request->file('photo')->extension();
            $final_name = 'logo_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            
            $obj->photo = $final_name;
        }

        $obj->language_id = $request->language_id;
        $obj->type = $request->type;
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->save();

        return redirect()->route('admin.learning-path.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminLearningPathEdit(int $id)
    {
        $languages = Language::get();
        $row_data = LearningPath::where('id', $id)->first();
        return view('admin.learning_path_edit', compact('row_data', 'languages'));
    }
    public function AdminLearningPathUpdate(Request $request, $id)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'type' => 'required|in:general,test_prep',
            'title' => 'required|string|max:255',
            'short_description' => 'required',
        ]);

        $obj = LearningPath::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png'
            ]);

            unlink(public_path('uploads/' . $obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'logo_' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj->photo = $final_name;
        }

        $obj->language_id = $request->language_id;
        $obj->type = $request->type;
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->update();

        return redirect()->route('admin.learning-path.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminLearningPathDelete(Request $request, $id)
    {
        $row_data = LearningPath::findOrFail($id);

        $image_path = public_path('uploads/'.$row_data->photo);
    
        if (!empty($row_data->photo) && file_exists($image_path)) {
            unlink($image_path);
        }
        
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Daily Goal
    public function AdminDailyGoalShow()
    {
        $all_data = DailyGoal::orderBy('id', 'asc')->get();
        return view('admin.daily_goal_show', compact('all_data'));
    }

    public function AdminDailyGoalAdd()
    {   
        return view('admin.daily_goal_add');
    }

    public function AdminDailyGoalSubmit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'target_time' => 'required',
            'type' => 'required|in:general,test_prep',
            'short_description' => 'required',
        ]);

        $obj = new DailyGoal();

        $obj->title = $request->title;
        $obj->target_time = $request->target_time;
        $obj->type = $request->type;
        $obj->short_description = $request->short_description;
        $obj->save();

        return redirect()->route('admin.daily-goal.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminDailyGoalEdit(int $id)
    {
        $row_data = DailyGoal::where('id', $id)->first();
        return view('admin.daily_goal_edit', compact('row_data'));
    }
    public function AdminDailyGoalUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'target_time' => 'required',
            'type' => 'required|in:general,test_prep',
            'short_description' => 'required',
        ]);

        $obj = DailyGoal::where('id', $id)->first();

        $obj->title = $request->title;
        $obj->target_time = $request->target_time;
        $obj->type = $request->type;
        $obj->short_description = $request->short_description;
        $obj->update();

        return redirect()->route('admin.daily-goal.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminDailyGoalDelete(Request $request, $id)
    {
        $row_data = DailyGoal::where('id', $id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Manage User
    public function AdminManageUserShow()
    {
        $users = User::with('progress')->get();
        return view('admin.manage_user_show', compact('users'));
    }

    // Manage Module 
    public function AdminManageModuleShow()
    {
        $all_data = Module::with('rLearningPath')->orderBy('id', 'asc')->get();
        return view('admin.manage_module_show', compact('all_data'));
    }

    public function AdminManageModuleManage($id)
    {
        $module = Module::findOrFail($id);
        $all_data = SubModule::with('rModule')->where('module_id', $id)->orderBy('id', 'asc')->get();
        return view('admin.manage', compact('module', 'all_data'));
    }

    public function AdminManageModuleAdd()
    {
        $learning_path = LearningPath::get();
        return view('admin.manage_module_add', compact('learning_path'));
    }

    public function AdminManageModuleSubmit(Request $request)
    {
        $request->validate([
            'learning_path_id' => 'required|exists:learning_paths,id',
            'title'       => 'required|string|max:255',
            'icon' => 'required',
            'color' => 'required|string|max:7',
            'background_color' => 'required|string|max:7',
        ]);

        $obj = new Module();

        $obj->learning_path_id = $request->learning_path_id;
        $obj->title = $request->title;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->background_color = $request->background_color;
        $obj->save();

        return redirect()->route('admin.manage-module.show')->with('success', 'Data is inserted successfully!');
    }

    public function AdminManageModuleEdit(int $id)
    {
        $learning_path = LearningPath::get();
        $row_data = Module::where('id', $id)->first();
        return view('admin.manage_module_edit', compact('row_data', 'learning_path'));
    }
    public function AdminManageModuleUpdate(Request $request, $id)
    {
        $request->validate([
            'learning_path_id' => 'required|exists:learning_paths,id',
            'title'       => 'required|string|max:255',
            'icon' => 'required',
            'color' => 'required|string|max:7',
            'background_color' => 'required|string|max:7',
        ]);

        $obj = Module::where('id', $id)->first();

        $obj->learning_path_id = $request->learning_path_id;
        $obj->title = $request->title;
        $obj->icon = $request->icon;
        $obj->color = $request->color;
        $obj->background_color = $request->background_color;
        $obj->update();

        return redirect()->route('admin.manage-module.show')->with('success', 'Data is updated successfully!');
    }

    public function AdminManageModuleDelete(Request $request, $id)
    {
        $row_data = Module::findOrFail($id);
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Sub Module
    public function AdminSubModuleShow()
    {
        $all_data = SubModule::with('rModule')->orderBy('id', 'asc')->get();
        return view('admin.sub_module_show', compact('all_data'));
    }

    public function AdminSubModuleAdd($id)
    {
        $modules = Module::findOrFail($id);
        return view('admin.sub_module_add', compact('modules'));
    }

    public function AdminSubModuleSubmit(Request $request, $id)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title'       => 'required|string|max:255',
            'time'       => 'required|integer|min:1',
            'point'       => 'required|integer|min:0',
        ]);

        $lastOrder = SubModule::where('module_id', $request->module_id)->max('order_number');
        $newOrder = $lastOrder ? $lastOrder + 1 : 1;

        $obj = new SubModule();

        $obj->module_id = $request->module_id;
        $obj->video_url = $request->video_url;
        $obj->title = $request->title;
        $obj->time = $request->time;
        $obj->point = $request->point;
        $obj->order_number = $newOrder;
        $obj->save();

        return redirect()->route('admin.manage-module.manage', $request->module_id)->with('success', 'Data is inserted successfully!');
    }

    public function AdminSubModuleEdit(int $id)
    {
        $row_data = SubModule::where('id', $id)->first();
        return view('admin.sub_module_edit', compact('row_data'));
    }

    public function AdminSubModuleUpdate(Request $request, $id)
    {
        $obj = SubModule::findOrFail($id);

        $totalSubModules = SubModule::where('module_id', $obj->module_id)->count();

        $request->validate([
            'title'        => 'required|string|max:255',
            'time'         => 'required|integer|min:1',
            'point'        => 'required|integer|min:0',
            'video_url'    => 'nullable|url',
            'order_number' => 'required|integer|min:1|max:' . $totalSubModules,
        ]);

        $oldOrder = $obj->order_number;
        $newOrder = $request->order_number;

        if ($oldOrder != $newOrder) {
            if ($newOrder < $oldOrder) {
                SubModule::where('module_id', $obj->module_id)
                    ->whereBetween('order_number', [$newOrder, $oldOrder - 1])
                    ->increment('order_number');
            } 
            else {
                SubModule::where('module_id', $obj->module_id)
                    ->whereBetween('order_number', [$oldOrder + 1, $newOrder])
                    ->decrement('order_number');
            }
        }

        $obj->video_url = $request->video_url;
        $obj->title = $request->title;
        $obj->time = $request->time;
        $obj->point = $request->point;
        $obj->order_number = $newOrder;
        
        $obj->update(); 

        return redirect()->route('admin.manage-module.manage', $obj->module_id)->with('success', 'Data is updated successfully!');
    }

    public function AdminSubModuleDelete(Request $request, $id)
    {
        $row_data = SubModule::findOrFail($id);

        $deletedOrder = $row_data->order_number;
        $moduleId = $row_data->module_id;

        $row_data->delete();

        SubModule::where('module_id', $moduleId)
                ->where('order_number', '>', $deletedOrder)
                ->decrement('order_number');

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Vocabulary
    public function AdminVocabularyShow($id)
    {
        $subModule = SubModule::with('rModule')->findOrFail($id);
        $all_data = Vocabulary::where('sub_module_id', $id) ->orderBy('id', 'asc')->get();
                
        return view('admin.vocabulary_show', compact('all_data', 'subModule'));
    }

    public function AdminVocabularyAdd($id)
    {
        $sub_module = SubModule::findOrFail($id);
        return view('admin.vocabulary_add', compact('sub_module'));
    }

    public function AdminVocabularySubmit(Request $request, $id)
    {
        $request->validate([
            'sub_module_id' => 'required|exists:sub_modules,id',
            'language_code' => 'required',
            'word'       => 'required|string',
            'meaning'       => 'required|string',
        ]);

        $subModule = SubModule::with('rModule.rLearningPath')->find($request->sub_module_id);

        $obj = new Vocabulary();

        $obj->sub_module_id = $request->sub_module_id;
        $obj->language_id = $subModule->rModule->rLearningPath->language_id;
        $obj->language_code = $request->language_code;
        $obj->word = $request->word;
        $obj->meaning = $request->meaning;
        $obj->save();

        return redirect()->route('admin.vocabulary.show', $request->sub_module_id)->with('success', 'Data is inserted successfully!');
    }

    public function AdminVocabularyEdit(int $id)
    {
        $row_data = Vocabulary::findOrFail($id);
        $sub_module = SubModule::findOrFail($row_data->sub_module_id);
        return view('admin.vocabulary_edit', compact('row_data', 'sub_module'));
    }
    public function AdminVocabularyUpdate(Request $request, $id)
    {
        $request->validate([
            'language_code' => 'required',
            'word'       => 'required|string',
            'meaning'       => 'required|string',
        ]);

        $obj = Vocabulary::findOrFail($id);

        $obj->language_code = $request->language_code;
        $obj->word = $request->word;
        $obj->meaning = $request->meaning;
        $obj->update();

        return redirect()->route('admin.vocabulary.show', $obj->sub_module_id)->with('success', 'Data is updated successfully!');
    }

    public function AdminVocabularyDelete($id) 
    {
        $row_data = Vocabulary::findOrFail($id);
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Practice quiz
    public function AdminPracticeQuizShow($id)
    {
        $subModule = SubModule::with('rModule')->findOrFail($id);
        $all_data = PracticeQuiz::where('sub_module_id', $id) ->orderBy('id', 'asc')->get();
        return view('admin.practice_quiz_show', compact('subModule', 'all_data'));
    }

    // Listen & Select
    public function AdminListenAndSelectAdd($id)
    {
        $sub_module = SubModule::findOrFail($id);
        return view('admin.practice_add_listen', compact('sub_module'));
    }

    public function AdminListenAndSelectSubmit(Request $request)
    {
        $request->validate([
            'sub_module_id' => 'required|exists:sub_modules,id',
            'question_text' => 'required|string',
            'language_code' => 'required',
            'options'        => 'required|array|min:4',
            'correct_answer' => 'required|string',
        ]);

        $lastOrder = PracticeQuiz::where('sub_module_id', $request->sub_module_id)->max('order_number');
        $newOrder = $lastOrder ? $lastOrder + 1 : 1;

        $obj = new PracticeQuiz();
        $obj->sub_module_id  = $request->sub_module_id;
        $obj->type           = 'listen_select'; 
        $obj->question_text  = $request->question_text;
        $obj->language_code  = $request->language_code;
        $obj->options        = json_encode($request->options); 
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number   = $newOrder; 
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $request->sub_module_id)->with('success', 'Data is inserted successfully!');
    }

    public function AdminListenAndSelectEdit($id)
    {
        $row_data = PracticeQuiz::findOrFail($id);
        $sub_module = SubModule::findOrFail($row_data->sub_module_id);
        return view('admin.practice_edit_listen', compact('row_data','sub_module'));
    }

    public function AdminListenAndSelectUpdate(Request $request, $id)
    {
        $obj = PracticeQuiz::findOrFail($id);

        $totalQuiz = PracticeQuiz::where('sub_module_id', $obj->sub_module_id)->count();
        
        $request->validate([
            'question_text' => 'required|string',
            'language_code' => 'required',
            'options'        => 'required|array|min:4',
            'correct_answer' => 'required|string',
            'order_number' => 'required|integer|min:1|max:' . $totalQuiz,
        ]);

        $oldOrder = $obj->order_number;
        $newOrder = $request->order_number;

        if ($oldOrder != $newOrder) {
            if ($newOrder < $oldOrder) {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$newOrder, $oldOrder - 1])
                    ->increment('order_number');
            } 
            else {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$oldOrder + 1, $newOrder])
                    ->decrement('order_number');
            }
        }

        $obj->type           = 'listen_select'; 
        $obj->question_text  = $request->question_text;
        $obj->language_code  = $request->language_code;
        $obj->options = json_encode($request->options); 
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number = $newOrder;
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $obj->sub_module_id)->with('success', 'Data is updated successfully!');
    }

    public function AdminListenAndSelectDelete($id) 
    {
        $row_data = PracticeQuiz::findOrFail($id);

        $deletedOrder = $row_data->order_number;
        $sub_module_id = $row_data->sub_module_id;

        $row_data->delete();

        PracticeQuiz::where('sub_module_id', $sub_module_id)
                ->where('order_number', '>', $deletedOrder)
                ->decrement('order_number');

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Fill in the blank multiple choice 
    public function AdminFillBlankMCAdd($id)
    {
        $sub_module = SubModule::findOrFail($id);
        return view('admin.practice_add_fill_mc', compact('sub_module'));
    }

    public function AdminFillBlankMCSubmit(Request $request)
    {
        $request->validate([
            'sub_module_id' => 'required|exists:sub_modules,id',
            'question_text' => 'required|string',
            'options'        => 'required|array|min:4',
            'correct_answer' => 'required|string',
        ]);

        $lastOrder = PracticeQuiz::where('sub_module_id', $request->sub_module_id)->max('order_number');
        $newOrder = $lastOrder ? $lastOrder + 1 : 1;

        $obj = new PracticeQuiz();
        $obj->sub_module_id  = $request->sub_module_id;
        $obj->type           = 'fill_blank_mc'; 
        $obj->question_text  = $request->question_text;
        $obj->options        = json_encode($request->options); 
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number   = $newOrder; 
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $request->sub_module_id)->with('success', 'Data is inserted successfully!');
    }

    public function AdminFillBlankMCEdit($id)
    {
        $row_data = PracticeQuiz::findOrFail($id);
        $sub_module = SubModule::findOrFail($row_data->sub_module_id);
        return view('admin.practice_edit_fill_mc', compact('row_data','sub_module'));
    }

    public function AdminFillBlankMCUpdate(Request $request, $id)
    {
        $obj = PracticeQuiz::findOrFail($id);

        $totalQuiz = PracticeQuiz::where('sub_module_id', $obj->sub_module_id)->count();
        
        $request->validate([
            'question_text' => 'required|string',
            'options'        => 'required|array|min:4',
            'correct_answer' => 'required|string',
            'order_number' => 'required|integer|min:1|max:' . $totalQuiz,
        ]);

        $oldOrder = $obj->order_number;
        $newOrder = $request->order_number;

        if ($oldOrder != $newOrder) {
            if ($newOrder < $oldOrder) {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$newOrder, $oldOrder - 1])
                    ->increment('order_number');
            } 
            else {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$oldOrder + 1, $newOrder])
                    ->decrement('order_number');
            }
        }

        $obj->type           = 'fill_blank_mc'; 
        $obj->question_text  = $request->question_text;
        $obj->options = json_encode($request->options); 
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number = $newOrder;
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $obj->sub_module_id)->with('success', 'Data is updated successfully!');
    }

    public function AdminFillBlankMCDelete($id) 
    {
        $row_data = PracticeQuiz::findOrFail($id);

        $deletedOrder = $row_data->order_number;
        $sub_module_id = $row_data->sub_module_id;

        $row_data->delete();

        PracticeQuiz::where('sub_module_id', $sub_module_id)
                ->where('order_number', '>', $deletedOrder)
                ->decrement('order_number');

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    // Fill in the blank input
    public function AdminFillBlankInputAdd($id)
    {
        $sub_module = SubModule::findOrFail($id);
        return view('admin.practice_add_fill_input', compact('sub_module'));
    }

    public function AdminFillBlankInputSubmit(Request $request)
    {
        $request->validate([
            'sub_module_id' => 'required|exists:sub_modules,id',
            'question_text' => 'required|string',
            'original_text' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $lastOrder = PracticeQuiz::where('sub_module_id', $request->sub_module_id)->max('order_number');
        $newOrder = $lastOrder ? $lastOrder + 1 : 1;

        $obj = new PracticeQuiz();
        $obj->sub_module_id  = $request->sub_module_id;
        $obj->type           = 'fill_blank_input'; 
        $obj->question_text  = $request->question_text;
        $obj->options        = json_encode([
            'original_text' => $request->original_text
        ]);
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number   = $newOrder; 
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $request->sub_module_id)->with('success', 'Data is inserted successfully!');
    }

    public function AdminFillBlankInputEdit($id)
    {
        $row_data = PracticeQuiz::findOrFail($id);
        $sub_module = SubModule::findOrFail($row_data->sub_module_id);
        return view('admin.practice_edit_fill_input', compact('row_data','sub_module'));
    }

    public function AdminFillBlankInputUpdate(Request $request, $id)
    {
        $obj = PracticeQuiz::findOrFail($id);

        $totalQuiz = PracticeQuiz::where('sub_module_id', $obj->sub_module_id)->count();
        
        $request->validate([
            'question_text' => 'required|string',
            'original_text' => 'required|string',
            'correct_answer' => 'required|string',
            'order_number' => 'required|integer|min:1|max:' . $totalQuiz,
        ]);

        $oldOrder = $obj->order_number;
        $newOrder = $request->order_number;

        if ($oldOrder != $newOrder) {
            if ($newOrder < $oldOrder) {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$newOrder, $oldOrder - 1])
                    ->increment('order_number');
            } 
            else {
                PracticeQuiz::where('sub_module_id', $obj->sub_module_id)
                    ->whereBetween('order_number', [$oldOrder + 1, $newOrder])
                    ->decrement('order_number');
            }
        }

        $obj->type           = 'fill_blank_input'; 
        $obj->question_text  = $request->question_text;
        $obj->options        = json_encode([
            'original_text' => $request->original_text
        ]);
        $obj->correct_answer = $request->correct_answer;
        $obj->order_number   = $newOrder; 
        $obj->save();

        return redirect()->route('admin.practice-quiz.show', $obj->sub_module_id)->with('success', 'Data is updated successfully!');
    }

    public function AdminFillBlankInputDelete($id) 
    {
        $row_data = PracticeQuiz::findOrFail($id);

        $deletedOrder = $row_data->order_number;
        $sub_module_id = $row_data->sub_module_id;

        $row_data->delete();

        PracticeQuiz::where('sub_module_id', $sub_module_id)
                ->where('order_number', '>', $deletedOrder)
                ->decrement('order_number');

        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }
}
