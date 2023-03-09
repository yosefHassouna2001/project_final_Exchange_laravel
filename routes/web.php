<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\SliderController;
use App\Mail\AdminEmail;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/')->middleware('guest:admin')->group(function(){
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'] )->name('login');
    Route::post('admin/login' , [UserAuthController::class , 'login']);
});

Route::prefix('cms/admin/')->middleware('auth:admin')->group(function(){
    Route::get('logout' , [UserAuthController::class , 'logout'] )->name('logout');
    Route::get('change_password' , [UserAuthController::class , 'changePassword'])->name('change_password');
    Route::post('update_password' , [UserAuthController::class , 'updatePassword'])->name('update_password');

    Route::get('edit-profile-admin' , [UserAuthController::class , 'editProfile'] )->name('edit-profile-admin');
    Route::post('update-profile' , [UserAuthController::class , 'UpdateProfile'] )->name('update-profile');

    Route::get('change-password' , [UserAuthController::class , 'changePassword'] )->name('change-password');
    Route::post('update-password' , [UserAuthController::class , 'updatePassword'] )->name('update-password');
    // cms.admin.edit-password
});

Route::prefix('cms/admin/')->middleware('auth:admin')->group(function(){
    Route::view('' , 'cms.home');
    // Route::view('' , 'cms.parentOld');
    Route::view('temp' , 'cms.temp');
    Route::view('index' , 'cms.country.index');

    Route::resource('countries' , CountryController::class);
    Route::post('update-countries/{id}' , [CountryController::class , 'update'])->name('update-countries');

    // Route::resource('roles' , RoleController::class);
    // Route::post('roles-update' , [RoleController::class , 'update']);
    // Route::resource('permissions' , PermissionController::class);
    // Route::post('permissions-update' , [PermissionController::class , 'update']);
    // Route::resource('roles.permissions' , RolePermissionController::class);

    // Country
    Route::resource('countries' , CountryController::class);
    Route::post('update-countries/{id}' , [CountryController::class , 'update'])->name('update-countries');
    Route::get('restoreindex-countries', [CountryController::class, 'restoreindex'])->name('restoreindex-countries');
    Route::get('restore-countries/{id}', [CountryController::class, 'restore'])->name('restore-countries');

    // Country
    Route::resource('cities' , CityController::class);
    Route::post('update-cities/{id}' , [CityController::class , 'update'])->name('update-cities');
    Route::get('restoreindex-cities', [CityController::class, 'restoreindex'])->name('restoreindex-cities');
    Route::get('restore-cities/{id}', [CityController::class, 'restore'])->name('restore-cities');

    // Location
    Route::resource('branches' , BranchController::class);
    Route::post('update-branches/{id}' , [BranchController::class , 'update'])->name('update-branches');
    Route::get('restoreindex-branches', [BranchController::class, 'restoreindex'])->name('restoreindex-branches');
    Route::get('restore-branches/{id}', [BranchController::class, 'restore'])->name('restore-branches');

    // Admin
    Route::resource('admins' , AdminController::class);
    Route::post('update-admins/{id}' , [AdminController::class , 'update'])->name('update-admins');
    Route::get('restoreindex-admins', [AdminController::class, 'restoreindex'])->name('restoreindex-admins');
    Route::get('restore-admins/{id}', [AdminController::class, 'restore'])->name('restore-admins');

    // Article
    Route::resource('articles' , ArticleController::class);
    Route::post('update-articles/{id}' , [ArticleController::class , 'update'])->name('update-articles');
    Route::get('restoreindex-articles', [ArticleController::class, 'restoreindex'])->name('restoreindex-articles');
    Route::get('restore-articles/{id}', [ArticleController::class, 'restore'])->name('restore-articles');


});

Route::resource('viewers' , ViewerController::class);
Route::post('update-viewers/{id}' , [ViewerController::class , 'update'])->name('update-viewers');

Route::prefix('front/')->group(function(){

    Route::get('home' , [HomeController::class , 'home'])->name('front.home');
    Route::get('about' , [HomeController::class , 'about'])->name('front.about');
    Route::get('services' , [HomeController::class , 'services'])->name('front.services');
    Route::get('currencies' , [HomeController::class , 'currencies'])->name('front.currencies');
    Route::get('archive' , [HomeController::class , 'archive'])->name('front.archive');
    Route::get('news' , [HomeController::class , 'news'])->name('front.news');
    Route::get('question' , [HomeController::class , 'question'])->name('front.question');
    Route::get('contact' , [HomeController::class , 'contact'])->name('front.contactUs');

    // Route::get('all/{id}' , [HomeController::class , 'all'])->name('news.all');


    // Route::get('det/{id}' , [HomeController::class , 'det'])->name('news.det');
    // Route::get('contacts' , [HomeController::class , 'contact'])->name('news.contact');
    // Route::post('contacts' , [HomeController::class , 'storeContact']);

});

// Route::get('email' , function(){
//     return new AdminEmail();
// });
