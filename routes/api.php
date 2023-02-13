<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::namespace('App\Http\Controllers\Api')->middleware(['changeLang'])->group(function() {
    Route::post('social_login', 'AuthController@social_login')->middleware('log.route');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('check-otp', 'AuthController@checkOtp');
    Route::post('check-mail-otp', 'AuthController@checkMailOtp');
    Route::post('send-otp', 'UserController@sendOtp');
    Route::post('send-mail-otp', 'UserController@sendMailOtp');
    Route::get('get-all-categories', 'CategoryController@getAllCategories');
    Route::get('get-all-categories', 'CategoryController@getAllCategories');
    Route::get('get-category-options/{id}', 'CategoryController@getCategoryOptions');
    Route::get('get-option-values/{id}', 'CategoryController@getOptionValues');
    Route::get('home', 'HomeController@home');
    Route::get('user-profile/{id}', 'UserController@userProfile');
    Route::get('static-data/{name}', 'HomeController@staticData');
    Route::get('faq', 'HomeController@faq');
    Route::get('related-ads/{id}', 'AdController@relatedAds');
    Route::get('auto-complete', 'AdController@autoComplete');
    Route::post('ads-filter', 'AdController@adsFilter');
    Route::get('ad-details/{id}', 'AdController@adDetails');
    Route::get('report-reasons', 'AdController@reportReasons');

});


Route::middleware(['auth:api','changeLang'])->namespace('App\Http\Controllers\Api')->group(function () {
    //user
    Route::post('reset-password', 'UserController@reset_password');
    Route::post('update-device-token', 'UserController@updateDeviceToken');
    Route::post('change-password', 'UserController@changePassword');
    Route::post('logout', 'AuthController@logout');
    Route::post('remove-account', 'UserController@removeAccount');
    Route::post('rate-user', 'UserController@rateUser')->middleware('log.route');
    Route::post('follow-user', 'UserController@followUser');
    Route::get('user-followers', 'UserController@userFollowers');
    Route::post('delete-user-follower', 'UserController@deleteUserFollower');
    Route::get('user-followings', 'UserController@userFollowings');
    Route::get('notifications', 'UserController@notifications')->middleware('log.route');
    Route::post('read-notification', 'UserController@readNotification')->middleware('log.route');
    Route::post('send-update-otp', 'UserController@sendUpdateOtp');
    Route::post('check-update-otp', 'UserController@checkUpdateOtp');

    //ads
    Route::post('create-new-ad', 'AdController@createNewAd');
    Route::post('upload-ad-image', 'AdController@uploadAdImage');
    Route::post('change-ad-cover/{ad_id}', 'AdController@changeAdCover');
    Route::post('edit-ad/{id}', 'AdController@editAd')->middleware('log.route');
    Route::post('delete-ad-image/{id}', 'AdController@deleteAdImage');
    Route::post('add-to-favourites/{id}', 'AdController@addToFavourites');
    Route::post('report-ad', 'AdController@reportAd');
    Route::post('user-selling-ads', 'AdController@userAds');
    Route::post('user-favourite-ads', 'AdController@userFavouriteAds');
    Route::post('mark-ad-as-sold/{id}', 'AdController@markAdAsSold');
    Route::post('delete-ad/{id}', 'AdController@deleteAd');
    Route::post('create-chat/{id}', 'AdController@makeOffer');
    Route::post('get-chat-id/{ad_id}', 'ConversationController@get_chat_id');
    Route::post('send-message/{chat_id}', 'AdController@sendMessage');
    Route::get('ad/{ad_id}/conversations', 'ConversationController@adConversations');
    Route::get('get-chat-details/{chat_id}', 'ConversationController@getChatDetails');
    Route::get('get/all-conversations', 'ConversationController@getAllConversations');
    Route::get('get/all-messages/{chat_id}', 'ConversationController@getAllMessages');
    Route::post('archive-ad/{ad_id}', 'AdController@archiveAd');
    Route::post('unarchive-ad/{ad_id}', 'AdController@unarchiveAd');


    Route::post('update_profile', 'UserController@update_profile');
//    Route::post('update_device_token', 'Api\UserController@update_device_token');


});


/***************** Dashboard ******************/

Route::namespace('App\Http\Controllers\Dashboard')->prefix('dashboard')->middleware(['changeLang'])->group(function() {
    Route::resource('categories', 'CategoryController');
    Route::resource('options', 'OptionController');
    Route::post('option/{id}/add-value', 'OptionController@add_value');
    Route::post('assign-option-to-category', 'CategoryController@assignOption');

});
