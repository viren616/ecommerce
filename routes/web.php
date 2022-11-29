<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MyWorkController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::middleware(['admin_auth'])->group(function () {
    route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// home ===============================================
route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
route::get('/admin/manage_home/{id?}', [HomeController::class, 'manage_home'])->name('admin.manage_home');
route::post('/admin/manage_home_process', [HomeController::class, 'manage_home_process'])->name('admin.manage_home_process');
route::get('/admin/home_delete/{id}', [HomeController::class, 'home_delete'])->name('admin.home_delete');
route::get('/admin/home_status/{status}/{id}', [HomeController::class, 'home_status'])->name('admin.home_status');
route::get('/admin/icon_delete/{id}/{profile_id}', [HomeController::class, 'icon_delete'])->name('admin.icon_delete');


// about ===============================================
route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
route::post('/admin/manage_about_process', [AboutController::class, 'manage_about_process'])->name('admin.manage_about_process');
route::get('/admin/skills_delete/{id}', [AboutController::class, 'skills_delete'])->name('admin.skills_delete');
route::get('/admin/interest_delete/{id}', [AboutController::class, 'interest_delete'])->name('admin.interest_delete');

// contact ===============================================
// route::get('/admin/contact',[ContactController::class,'index'])->name('admin.contact');
route::post('/admin/manage_contact', [ContactController::class, 'manage_contact'])->name('admin.manage_contact');
// route::get('/admin/skills_delete/{id}',[AboutController::class,'skills_delete'])->name('admin.skills_delete');
// route::get('/admin/interest_delete/{id}',[AboutController::class,'interest_delete'])->name('admin.interest_delete');



// mywork==============================================
route::get('/admin/mywork', [MyWorkController::class, 'index'])->name('admin.mywork');
route::get('/admin/manage_mywork/{id?}', [MyWorkController::class, 'manage_mywork'])->name('admin.manage_mywork');
route::post('/admin/manage_mywork_process', [MyWorkController::class, 'manage_mywork_process'])->name('admin.manage_mywork_process');
route::get('/admin/image_delete/{id}/{pid?}', [MyWorkController::class, 'image_delete'])->name('admin.image_delete');
route::get('/admin/mywork_delete/{id}', [MyWorkController::class, 'mywork_delete'])->name('admin.mywork_delete');


// resume ===============================================
route::get('/admin/resume', [ResumeController::class, 'index'])->name('admin.resume');
route::post('/admin/manage_resume_process', [ResumeController::class, 'manage_resume_process'])->name('admin.manage_resume_process');
route::get('/admin/experience_delete/{id}', [ResumeController::class, 'experience_delete'])->name('admin.experience_delete');
route::get('/admin/education_delete/{id}', [ResumeController::class, 'education_delete'])->name('admin.education_delete');


//service Controller =====================================
route::get('/admin/manage_service', [ServiceController::class, 'index'])->name('admin.manage_service');
// route::post('/admin/manage_resume_process', [ResumeController::class, 'manage_resume_process'])->name('admin.manage_resume_process');
// route::get('/admin/experience_delete/{id}', [ResumeController::class, 'experience_delete'])->name('admin.experience_delete');
// route::get('/admin/education_delete/{id}', [ResumeController::class, 'education_delete'])->name('admin.education_delete');


route::get('/admin/logout', function () {
    session()->forget('Admin_login');
    session()->forget('Admin_id');
    session()->forget('Admin_name');
    return redirect('/admin');
})->name('admin.logout');



route::get('/', [FrontController::class, 'index'])->name('front.home');
route::get('/front/portfolio_details/{id}', [FrontController::class, 'portfolio_details'])->name('front.portfolio_details');
route::get('test', [FrontController::class, 'test'])->name('front.test');
