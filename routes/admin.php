<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth','checkAdmin'])->namespace('App\Http\Controllers')->group(function () {
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('log', 'Admin\AdminController@log')->name('admin.log');

    //admin
    Route::get('admin-edit', 'Admin\AdminController@editProfile')->name('admin.editProfile');
    Route::post('admin-update', 'Admin\AdminController@updateProfile')->name('admin.updateProfile');

//categories
    Route::resource('categories', 'Admin\CategoryController',['as'=>'admin']);
    Route::get('categories/{id}/options', 'Admin\CategoryController@options')->name('admin.categories.options');
    Route::get('categories/{cat_id}/add-option/{option_id}/{status?}', 'Admin\CategoryController@assignOption')->name('admin.categories.assignOption');
    Route::delete('categories/{cat_id}/remove-option/{option_id}', 'Admin\CategoryController@removeOption')->name('admin.categories.removeOption');

    Route::resource('options', 'Admin\OptionController',['as'=>'admin']);
    Route::post('option/{id}/add-value', 'Admin\OptionController@addValue')->name('admin.options.addValue');
    Route::delete('option/value/{id}/delete', 'Admin\OptionController@deleteValue')->name('admin.options.deleteValue');
//users
        Route::resource('users', 'Admin\UserController',['as'=>'admin']);
        Route::get('users/{id}/block', 'Admin\UserController@block')->name('admin.users.block');
        Route::post('users/action/bulk', 'Admin\UserController@bulk')->name('admin.users.bulk');
//ads
    Route::resource('ads', 'Admin\AdController',['as'=>'admin']);
    Route::resource('reports', 'Admin\ReportController',['as'=>'admin']);
    Route::resource('contacts', 'Admin\ContactController',['as'=>'admin']);
    Route::resource('settings', 'Admin\SettingController',['as'=>'admin']);
    Route::resource('notifications', 'Admin\NotificationController',['as'=>'admin']);
    Route::resource('permissions', 'Admin\PermissionController', ['as' => 'admin']);











//    Route::get('time-line', 'Admin\AdminController@log')->name('log');
//
//    Route::resource('cms-users', 'Admin\CMSUserController',['as'=>'admin']);
//    Route::resource('users', 'Admin\UserController',['as'=>'admin']);
//    Route::resource('companies', 'Admin\CompanyController',['as'=>'admin']);
//    Route::resource('countries', 'Admin\CountryController',['as'=>'admin']);
//    Route::resource('access-codes', 'Admin\AccessCodeController',['as'=>'admin']);
//    Route::get('access-codes-requests', 'Admin\AccessCodeController@access_codes_requests')->name('admin.access_codes_requests');
//    Route::get('access-codes-status/{id}/{status}', 'Admin\AccessCodeController@change_status')->name('admin.access_codes.change_status');
//
//    Route::resource('groups', 'Admin\GroupController',['as'=>'admin']);
//    Route::get('groups/{id}/add-users', 'Admin\GroupController@add_users')->name('admin.groups.add_users');
//    Route::post('groups/{id}/save-users', 'Admin\GroupController@save_users')->name('admin.groups.save_users');
//    Route::get('groups/{id}/view-users', 'Admin\GroupController@view_users')->name('admin.groups.view_users');
//    Route::resource('categories', 'Admin\CategoryController',['as'=>'admin']);
//    Route::resource('sectors', 'Admin\SectorController',['as'=>'admin']);
//    Route::resource('games', 'Admin\GameController',['as'=>'admin']);
//    Route::get('mark-as-read', 'Admin\NotificationController@markAsRead')->name('admin.notifications.mark_as_read');
//
//
//
//
//    Route::resource('sliders', \Admin\SliderController::class,['as'=>'admin']);
//    Route::resource('settings', \Admin\SettingController::class,['as'=>'admin']);
//    Route::resource('cities', \Admin\CityController::class,['as'=>'admin']);
//    Route::resource('areas', \Admin\AreaController::class,['as'=>'admin']);
//    Route::resource('contacts', \Admin\ContactController::class,['as'=>'admin']);
//    Route::resource('values', \Admin\OptionValueController::class,['as'=>'admin']);
//    Route::resource('trophies', \Admin\TrophyController::class,['as'=>'admin']);
//    Route::get('users/activate/{user_id}', 'Admin\UserController@activate_user')->name('admin.users.activate');
//    Route::get('users/block/{user_id}', 'Admin\UserController@block_user')->name('admin.users.block');
//    Route::get('users/all/bulk-delete', 'Admin\UserController@users_delete')->name('admin.users.bulk_delete');
//    Route::get('users/all/bulk-activate', 'Admin\UserController@bulk_activate')->name('admin.users.bulk_activate');

});
