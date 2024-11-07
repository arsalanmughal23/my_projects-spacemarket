<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('web.home');
Route::get('/marketplace/{pageSlug}', [App\Http\Controllers\Web\HomeController::class, 'marketplace'])->name('web.marketplace');
Route::get('/trading/{pageSlug}', [App\Http\Controllers\Web\HomeController::class, 'trading'])->name('web.trading');
Route::get('/partner/{pageSlug}', [App\Http\Controllers\Web\HomeController::class, 'partner'])->name('web.partner');
Route::get('/support/{pageSlug}', [App\Http\Controllers\Web\HomeController::class, 'support'])->name('web.support');
Route::get('/blogs', [App\Http\Controllers\Web\HomeController::class, 'blogs'])->name('web.blogs.index');
Route::get('/blogs/{id}', [App\Http\Controllers\Web\HomeController::class, 'showBlog'])->name('web.blogs.show');


Route::post('/user_requests', [App\Http\Controllers\Web\UserRequestController::class, 'store'])->name('web.user_requests.store');
Route::get('/user_requests', function(){ abort(404); });

// Route::get('oauth/redirect', function(Request $request){
//     dd($request->all());
// });

Route::get('clear_cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    dd("Done");
});

Route::get('storage_link', function () {
    Artisan::call('storage:link');
    dd("Done");
});


Route::get('/download-file', [App\Http\Controllers\LegalDocumentController::class , 'download'])->name('download.file');

// Route::group(['middleware' => ['auth', 'dynamic_permission']], function () {
Route::group(['prefix' => 'admin'], function () {

    // Auth::routes();
    Auth::routes(['register' => false]);

    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'homeEdit'])->name('home.edit');
        Route::post('/home', [App\Http\Controllers\HomeController::class, 'homeUpdate'])->name('home.update');

        Route::get('/marketplace/{pageSlug}', [App\Http\Controllers\HomeController::class, 'marketplaceEdit'])->name('marketplace.edit');
        Route::post('/marketplace/{pageSlug}', [App\Http\Controllers\HomeController::class, 'marketplaceUpdate'])->name('marketplace.update');
        
        Route::get('/trading/{pageSlug}', [App\Http\Controllers\HomeController::class, 'tradingEdit'])->name('trading.edit');
        Route::post('/trading/{pageSlug}', [App\Http\Controllers\HomeController::class, 'tradingUpdate'])->name('trading.update');
        
        Route::get('/partner/{pageSlug}', [App\Http\Controllers\HomeController::class, 'partnerEdit'])->name('partner.edit');
        Route::post('/partner/{pageSlug}', [App\Http\Controllers\HomeController::class, 'partnerUpdate'])->name('partner.update');
        
        Route::get('/support/{pageSlug}', [App\Http\Controllers\HomeController::class, 'supportEdit'])->name('support.edit');
        Route::post('/support/{pageSlug}', [App\Http\Controllers\HomeController::class, 'supportUpdate'])->name('support.update');

        Route::get('layout_part/{pageSlug}', [App\Http\Controllers\HomeController::class, 'layoutPartEdit'])->name('layout_part.edit');
        Route::post('layout_part/{pageSlug}', [App\Http\Controllers\HomeController::class, 'layoutPartUpdate'])->name('layout_part.update');

        Route::get('blog_list_page', [App\Http\Controllers\HomeController::class, 'blogListPageEdit'])->name('blog_list_page.edit');
        Route::post('blog_list_page', [App\Http\Controllers\HomeController::class, 'blogListPageUpdate'])->name('blog_list_page.update');

        Route::resource('departments', App\Http\Controllers\DepartmentController::class);
        Route::resource('user_requests', App\Http\Controllers\UserRequestController::class)->except('index');
        Route::get('user_requests', [App\Http\Controllers\UserRequestController::class, 'index'])->name('user_requests.index');




        Route::resource('data_lists', App\Http\Controllers\DataListController::class);
        Route::resource('account_types', App\Http\Controllers\AccountTypeController::class);
        Route::resource('trading_options', App\Http\Controllers\TradingOptionController::class);
        Route::resource('testimonials', App\Http\Controllers\TestimonialController::class);
        Route::resource('learning_videos', App\Http\Controllers\LearningVideoController::class);
        Route::resource('legal_documents', App\Http\Controllers\LegalDocumentController::class);
        Route::resource('payment_methods', App\Http\Controllers\PaymentMethodController::class);

        Route::resource('blogs', App\Http\Controllers\BlogController::class);
        Route::resource('faqs', App\Http\Controllers\FaqController::class);
        Route::resource('white_labels', App\Http\Controllers\WhiteLabelController::class);




        Route::post('/generate-crud-from-table', [App\Http\Controllers\GenerateTableController::class, 'generateCrudFromTable'])->name('dbtables.generate_crud_from_table');

        Route::get('/create-menus', [App\Http\Controllers\GenerateTableController::class, 'createMenu'])->name('dbtables.create_menus');

        Route::get('/delete-menus', [App\Http\Controllers\GenerateTableController::class, 'deleteMenu'])->name('dbtables.delete_menus');

        Route::get('/generated-crud-delete-permissions', [App\Http\Controllers\GenerateTableController::class, 'deletePermissions'])->name('dbtables.generated_crud_delete_permissions');

        Route::get('/run_artisan_command/{id}', [App\Http\Controllers\GenerateTableController::class, 'runArtisanCommand'])->name('dbtables.run_artisan_command');

        Route::get('/create_permissions/{id}', [App\Http\Controllers\GenerateTableController::class, 'createPermissions'])->name('dbtables.create_permissions');

        Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

        Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

        Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

        Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

        Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

        Route::post(
            'generator_builder/generate-from-file',
            '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
        )->name('io_generator_builder_generate_from_file');



        Route::get('/users/assignroles/{id}', [App\Http\Controllers\UsersController::class, 'assignRoles'])->name('users.assignroles');
        Route::patch('/users/updateroles/{id}', [App\Http\Controllers\UsersController::class, 'updateRoles'])->name("roles.rolesupdate");

        Route::get('/roles/assignpermissions/{id}', [App\Http\Controllers\RolesController::class, 'assignPermissions'])->name('roles.assignpermissions');
        Route::patch('/roles/updatepermissions/{id}', [App\Http\Controllers\RolesController::class, 'updatePermissions'])->name("roles.permissionsupdate");

        Route::resource('menus', App\Http\Controllers\MenuController::class);

        Route::resource('roles', App\Http\Controllers\RolesController::class);

        Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

        Route::resource('users', App\Http\Controllers\UsersController::class);

        Route::get('profile/edit', [App\Http\Controllers\UsersController::class, 'editProfile'])->name('profile.edit');
        Route::post('profile/update', [App\Http\Controllers\UsersController::class, 'updateProfile'])->name('profile.update');
    });

    // Route::get('settings/edit', [App\Http\Controllers\SettingController::class, 'createOrEdit'])->name('settings.edit');
    // Route::patch('settings/update', [App\Http\Controllers\SettingController::class, 'storeOrUpdate'])->name('settings.update');
    
    Route::resource('cms', App\Http\Controllers\CmsController::class);
    Route::get('/getPageWithSections', [App\Http\Controllers\CmsController::class, 'getPageWithSections'])->name('getPageWithSections');
});

