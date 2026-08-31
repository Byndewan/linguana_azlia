<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Middleware\CheckOnBoarding;

Route::get('/', [UserController::class, 'index'])->name('home');

// ===== Start User ========

// Route::get('/reset-session', function () {
//     session()->flush(); 
//     return redirect()->route('choose-language');
// });

// Onboarding
Route::middleware(['onboard.token'])->group(function () {
    Route::get('/choose-language', [UserController::class, 'ChooseLanguage'])->name('choose-language');
    Route::post('/choose-language', [UserController::class, 'PostChooseLanguage'])->name('post.choose.language');
    Route::post('/onboarding/cancel', [UserController::class, 'CancelOnboarding'])->name('onboarding.cancel');

    Route::middleware(['onboarding.guard:2'])->group(function () {
        Route::get('/choose-path', [UserController::class, 'ChoosePath'])->name('choose-path');
        Route::post('/choose-path', [UserController::class, 'PostChoosePath'])->name('post.choose.path');
    });

    Route::middleware(['onboarding.guard:3'])->group(function () {
        Route::get('/choose-daily-goal', [UserController::class, 'ChooseGoal'])->name('choose-daily-goal');
        Route::post('/choose-daily-goal', [UserController::class, 'PostChooseGoal'])->name('post.choose.daily.goal');
    });

    Route::middleware(['onboarding.guard:test'])->group(function () {
        Route::get('/choose-test', [UserController::class, 'ChooseTest'])->name('choose-test');
        Route::post('/choose-test', [UserController::class, 'PostChooseTest'])->name('post.choose.test');
    });

    Route::get('/sign-up', [UserController::class, 'SignUp'])->name('user.sign-up');
    Route::post('/sign-up-submit', [UserController::class, 'SignUpSubmit'])->name('user.sign-up.submit');
});

Route::get('/login', [UserController::class, 'Login'])->name('user.login');
Route::post('/login-submit', [UserController::class, 'LoginSubmit'])->name('user.login.submit');
Route::get('/forgot-password', [UserController::class, 'ForgotPassword'])->name('user.forgot-password');
Route::post('/forgot-password-submit', [UserController::class, 'ForgotPasswordSubmit'])->name('user.forgot-password-submit');
Route::get('/reset-password/{token}/{email}', [UserController::class, 'ResetPassword'])->name('user.reset-password');
Route::post('/reset-password-submit', [UserController::class, 'ResetPasswordSubmit'])->name('user.reset-password-submit');

Route::middleware(['auth'])->group(function () { 
    // General Test
    Route::post('/logout', [UserController::class, 'Logout'])->name('user.logout');
    Route::get('/general/dashboard', [UserController::class, 'UserGeneralDashboard'])->name('user.general.dashboard');
    Route::get('/general/module', [UserController::class, 'UserGeneralModule'])->name('user.general.module');
    Route::get('/general/sub-module/{id}', [UserController::class, 'UserGeneralSubModule'])->name('user.general.sub-module');
    Route::get('/general/flashcard', [UserController::class, 'UserGeneralFlashcard'])->name('user.general.flashcard');
    Route::get('/general/listen-and-select', [UserController::class, 'UserGeneralListenAndSelect'])->name('user.general.listen.and.select');
    Route::get('/general/final-quiz', [UserController::class, 'UserFinalQuiz'])->name('user.general.final-quiz');
    Route::get('/general/final-quiz/quiz-result', [UserController::class, 'UserQuizResult'])->name('user.general.quiz-result');
    Route::get('/general/profile', [UserController::class, 'UserProfile'])->name('user.profile');

    // Test Prep
    Route::get('/test-prep/dashboard', [UserController::class, 'UserTestDashboard'])->name('user.test-prep.dashboard');
    Route::get('/test-prep/module', [UserController::class, 'UserTestModule'])->name('user.test-prep.module');
    Route::get('/test-prep/video-lesson', [UserController::class, 'UserVideoLesson'])->name('user.test-prep.video-lesson');
    Route::get('/test-prep/full-mock-test', [UserController::class, 'UserFullMockTest'])->name('user.test-prep.full-mock-test');
    Route::get('/test-prep/full-mock-test/result', [UserController::class, 'UserFullMockTestResult'])->name('user.test-prep.full-mock-test-result');
});
// ===== End User ========

// ===== Start Admin ========
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login-submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login.submit');

Route::middleware([Admin::class])->group(function () { 
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/edit-profile-submit', [AdminController::class, 'AdminProfileSubmit'])->name('admin.profile.submit');

    // Hero
    Route::get('/admin/hero-items', [AdminController::class, 'AdminHeroItems'])->name('admin.hero.items');
    Route::post('/admin/hero-items-submit', [AdminController::class, 'AdminHeroItemsSubmit'])->name('admin.hero.items.submit');

    // Clients
    Route::get('/admin/client/show', [AdminController::class, 'AdminClientShow'])->name('admin.client.show');
    Route::post('/admin/client/submit', [AdminController::class, 'AdminClientSubmit'])->name('admin.client.submit');
    Route::post('/admin/client/delete/{id}', [AdminController::class, 'AdminClientDelete'])->name('admin.client.delete');

    // Service
    Route::get('/admin/service/show', [AdminController::class, 'AdminServiceShow'])->name('admin.service.show');
    Route::get('/admin/service/add', [AdminController::class, 'AdminServiceAdd'])->name('admin.service.add');
    Route::post('/admin/service/submit', [AdminController::class, 'AdminServiceSubmit'])->name('admin.service.submit');
    Route::get('/admin/service/edit/{id}', [AdminController::class, 'AdminServiceEdit'])->name('admin.service.edit');
    Route::post('/admin/service/update/{id}', [AdminController::class, 'AdminServiceUpdate'])->name('admin.service.update');
    Route::post('/admin/service/delete/{id}', [AdminController::class, 'AdminServiceDelete'])->name('admin.service.delete');

    // Process
    Route::get('/admin/process/show', [AdminController::class, 'AdminProcessShow'])->name('admin.process.show');
    Route::get('/admin/process/add', [AdminController::class, 'AdminProcessAdd'])->name('admin.process.add');
    Route::post('/admin/process/submit', [AdminController::class, 'AdminProcessSubmit'])->name('admin.process.submit');
    Route::get('/admin/process/edit/{id}', [AdminController::class, 'AdminProcessEdit'])->name('admin.process.edit');
    Route::post('/admin/process/update/{id}', [AdminController::class, 'AdminProcessUpdate'])->name('admin.process.update');
    Route::post('/admin/process/delete/{id}', [AdminController::class, 'AdminProcessDelete'])->name('admin.process.delete');

    // Testimonial
    Route::get('/admin/testimonial/show', [AdminController::class, 'AdminTestimonialShow'])->name('admin.testimonial.show');
    Route::get('/admin/testimonial/add', [AdminController::class, 'AdminTestimonialAdd'])->name('admin.testimonial.add');
    Route::post('/admin/testimonial/submit', [AdminController::class, 'AdminTestimonialSubmit'])->name('admin.testimonial.submit');
    Route::get('/admin/testimonial/edit/{id}', [AdminController::class, 'AdminTestimonialEdit'])->name('admin.testimonial.edit');
    Route::post('/admin/testimonial/update/{id}', [AdminController::class, 'AdminTestimonialUpdate'])->name('admin.testimonial.update');
    Route::post('/admin/testimonial/delete/{id}', [AdminController::class, 'AdminTestimonialDelete'])->name('admin.testimonial.delete');

    // Language 
    Route::get('/admin/language/show', [AdminController::class, 'AdminLanguageShow'])->name('admin.language.show');
    Route::get('/admin/language/add', [AdminController::class, 'AdminLanguageAdd'])->name('admin.language.add');
    Route::post('/admin/language/submit', [AdminController::class, 'AdminLanguageSubmit'])->name('admin.language.submit');
    Route::get('/admin/language/edit/{id}', [AdminController::class, 'AdminLanguageEdit'])->name('admin.language.edit');
    Route::post('/admin/language/update/{id}', [AdminController::class, 'AdminLanguageUpdate'])->name('admin.language.update');
    Route::post('/admin/language/delete/{id}', [AdminController::class, 'AdminLanguageDelete'])->name('admin.language.delete');

    // Learning Path
    Route::get('/admin/learning-path/show', [AdminController::class, 'AdminLearningPathShow'])->name('admin.learning-path.show');
    Route::get('/admin/learning-path/add', [AdminController::class, 'AdminLearningPathAdd'])->name('admin.learning-path.add');
    Route::post('/admin/learning-path/submit', [AdminController::class, 'AdminLearningPathSubmit'])->name('admin.learning-path.submit');
    Route::get('/admin/learning-path/edit/{id}', [AdminController::class, 'AdminLearningPathEdit'])->name('admin.learning-path.edit');
    Route::post('/admin/learning-path/update/{id}', [AdminController::class, 'AdminLearningPathUpdate'])->name('admin.learning-path.update');
    Route::post('/admin/learning-path/delete/{id}', [AdminController::class, 'AdminLearningPathDelete'])->name('admin.learning-path.delete');

    // Daily Goal
    Route::get('/admin/daily-goal/show', [AdminController::class, 'AdminDailyGoalShow'])->name('admin.daily-goal.show');
    Route::get('/admin/daily-goal/add', [AdminController::class, 'AdminDailyGoalAdd'])->name('admin.daily-goal.add');
    Route::post('/admin/daily-goal/submit', [AdminController::class, 'AdminDailyGoalSubmit'])->name('admin.daily-goal.submit');
    Route::get('/admin/daily-goal/edit/{id}', [AdminController::class, 'AdminDailyGoalEdit'])->name('admin.daily-goal.edit');
    Route::post('/admin/daily-goal/update/{id}', [AdminController::class, 'AdminDailyGoalUpdate'])->name('admin.daily-goal.update');
    Route::post('/admin/daily-goal/delete/{id}', [AdminController::class, 'AdminDailyGoalDelete'])->name('admin.daily-goal.delete');

    // Manage User
    Route::get('/admin/manage-user/show', [AdminController::class, 'AdminManageUserShow'])->name('admin.manage-user.show');

    // Manage Module
    Route::get('/admin/manage-module/show', [AdminController::class, 'AdminManageModuleShow'])->name('admin.manage-module.show');
    Route::get('/admin/manage-module/add', [AdminController::class, 'AdminManageModuleAdd'])->name('admin.manage-module.add');
    Route::post('/admin/manage-module/submit', [AdminController::class, 'AdminManageModuleSubmit'])->name('admin.manage-module.submit');
    Route::get('/admin/manage-module/edit/{id}', [AdminController::class, 'AdminManageModuleEdit'])->name('admin.manage-module.edit');
    Route::post('/admin/manage-module/update/{id}', [AdminController::class, 'AdminManageModuleUpdate'])->name('admin.manage-module.update');
    Route::post('/admin/manage-module/delete/{id}', [AdminController::class, 'AdminManageModuleDelete'])->name('admin.manage-module.delete');

    // Sub Module
    Route::get('/admin/sub-module/show', [AdminController::class, 'AdminSubModuleShow'])->name('admin.sub-module.show');
    Route::get('/admin/sub-module/add', [AdminController::class, 'AdminSubModuleAdd'])->name('admin.sub-module.add');
    Route::post('/admin/sub-module/submit', [AdminController::class, 'AdminSubModuleSubmit'])->name('admin.sub-module.submit');
    Route::get('/admin/sub-module/edit/{id}', [AdminController::class, 'AdminSubModuleEdit'])->name('admin.sub-module.edit');
    Route::post('/admin/sub-module/update/{id}', [AdminController::class, 'AdminSubModuleUpdate'])->name('admin.sub-module.update');
    Route::post('/admin/sub-module/delete/{id}', [AdminController::class, 'AdminSubModuleDelete'])->name('admin.sub-module.delete');

    // Vocabulary
    Route::get('/admin/vocabulary/show', [AdminController::class, 'AdminVocabularyShow'])->name('admin.vocabulary.show');
    Route::get('/admin/vocabulary/add', [AdminController::class, 'AdminVocabularyAdd'])->name('admin.vocabulary.add');
    Route::post('/admin/vocabulary/submit', [AdminController::class, 'AdminVocabularySubmit'])->name('admin.vocabulary.submit');
    Route::get('/admin/vocabulary/edit/{id}', [AdminController::class, 'AdminVocabularyEdit'])->name('admin.vocabulary.edit');
    Route::post('/admin/vocabulary/update/{id}', [AdminController::class, 'AdminVocabularyUpdate'])->name('admin.vocabulary.update');
    Route::post('/admin/vocabulary/delete/{id}', [AdminController::class, 'AdminVocabularyDelete'])->name('admin.vocabulary.delete');

    Route::get('/admin/manage', [AdminController::class, 'AdminManage'])->name('admin.manage');
});

Route::get('/admin/forgot-password', [AdminController::class, 'AdminForgotPassword'])->name('admin.forgot-password');
Route::post('/admin/forgot-password-submit', [AdminController::class, 'AdminForgotPasswordSubmit'])->name('admin.forgot-password-submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminController::class, 'AdminResetPassword'])->name('admin.reset-password');
Route::post('/admin/reset-password-submit', [AdminController::class, 'AdminResetPasswordSubmit'])->name('admin.reset-password-submit');
// End Admin




