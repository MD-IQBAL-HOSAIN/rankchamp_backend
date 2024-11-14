<?php

use App\Http\Controllers\Web\Backend\PrivacyPolicyController;
use App\Http\Controllers\Web\Backend\SocialMediaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\SystemSettingController;


//!Route for SystemSettingController
Route::controller(SystemSettingController::class)->group(function () {
    Route::get('/system-setting', 'index')->name('admin.system.setting');
    Route::post('/system/settings', 'update')->name('admin.system.update');

    Route::get('/system/profile', 'profileindex')->name('profilesetting');
    Route::post('/profile', 'profileupdate')->name('profile.update');
    Route::post('/password', 'passwordupdate')->name('password.update');

    Route::get('/system/mail', 'mailSetting')->name('system.mail.index');
    Route::post('/system/mail', 'mailSettingUpdate')->name('system.mail.update');

    Route::get('/system/stripe', 'stripeindex')->name('stripe.index');
    Route::post('/system/stripe', 'stripestore')->name('stripe.store');


    // Route::get('/system/paypal', 'paypalindex')->name('paypal.index');
    // Route::post('/system/paypal', 'paypalstore')->name('paypal.store');
    //  Route::post('/pro', 'paypalstore')->name('paypal.store');
});

// Social Media Module
Route::controller(SocialMediaController::class)->group(function () {
    Route::get('social-media', 'index')->name('social.media');
    Route::put('social-media/{id}', 'update')->name('social.media.update');
    Route::delete('social-media/{id}', 'destroy')->name('social.media.destroy');
});

//!Route for PrivacyPolicyController
Route::controller(PrivacyPolicyController::class)->group(function () {
    Route::get('/privacy/{slug}/edit', 'editprivacy')->name('privacy.edit');
    Route::put('/privacy/{slug}', 'privacyupdate')->name('privacy.update');

    Route::get('/terms/{slug}/edit', 'editterms')->name('terms.edit');
    Route::put('/terms/{slug}', 'termsupdate')->name('terms.update');

});
