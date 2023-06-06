<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

Auth::routes();

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/',  'index');
    Route::get('/home',  'index')->name('home');
    Route::get('/contact-us',  'getContactUsPage')->name('contact');
    Route::get('/search',  'getSearch')->name('search');
    Route::get('/profile/{slug}',  'getProfile')->name('profile');
    Route::post('/profile/{slug}/review',  'createReview')->name('profile.create.review');
    Route::get('/category/{category}',  'getByCategory')->name('category');
    Route::post('/get-available-time-slots',  'getAvailableTimeSlotsByDay');
    Route::post('/confirm-booking',  'confirmBooking')->name('confirm-booking');
    Route::post('/review/store',  'createReview')->name('review.store');
});

Route::get('/google/connect', 'App\Http\Controllers\Auth\GoogleController@connect')->name('google.connect');;
Route::get('/google/callback', 'App\Http\Controllers\Auth\GoogleController@callback');

Route::middleware(['auth'])->group(function () {

    Route::prefix('account')->name('account.')->group(function () {

        Route::get('/',             'App\Http\Controllers\Account\DashboardController@index')->name('dashboard');

        Route::get('/profile',             'App\Http\Controllers\Account\ProfileController@index')->name('profile');
        Route::post('/profile/user',       'App\Http\Controllers\Account\ProfileController@updateUser')->name('profile.user.update');
        Route::get('/profile/user/booking/datatable',       'App\Http\Controllers\Account\BookingController@getDatatable')->name('profile.user.booking.datatable');
        Route::post('/profile/user/booking/update/{id}',       'App\Http\Controllers\Account\BookingController@updateStatus')->name('profile.user.booking.update');
        Route::post('/profile/provider',   'App\Http\Controllers\Account\ProfileController@updateProvider')->name('profile.provider.update');

        Route::get('/documents',           'App\Http\Controllers\Account\DocumentController@index')->name('documents.verify');

        Route::get('/settings/change_password',          'App\Http\Controllers\Account\SettingsController@changePassword')->name('settings.change_password');
        Route::post('/settings/update/change_password',  'App\Http\Controllers\Account\SettingsController@updatePasswordChange')->name('settings.update.change_password');

        Route::get('/chat',  'App\Http\Controllers\Account\ChatController@index')->name('chat');

        Route::get('/subscriptions',  'App\Http\Controllers\Account\SubscriptionsController@index')->name('subscriptions')->middleware('user.subscribed');
        Route::get('/subscriptions/plans/{plan}',  'App\Http\Controllers\Account\SubscriptionsController@show')->name('plans.show');
        Route::post('/subscriptions/create',  'App\Http\Controllers\Account\SubscriptionsController@subscription')->name('subscription.create');
        Route::get('/subscriptions/status',  'App\Http\Controllers\Account\SubscriptionsController@status')->name('subscription.status');
        
        Route::get('/booking',  'App\Http\Controllers\Account\BookingController@index')->name('booking');

        Route::get('/testimonials',               'App\Http\Controllers\Account\TestimonialController@index')->name('testimonials');
        Route::get('/testimonials/edit/{id}',          'App\Http\Controllers\Account\TestimonialController@edit')->name('testimonials.edit');
        Route::get('/testimonials/create',        'App\Http\Controllers\Account\TestimonialController@create')->name('testimonials.create');
        Route::post('/testimonials/store',        'App\Http\Controllers\Account\TestimonialController@store')->name('testimonials.store');
        Route::post('/testimonials/update/{id}',  'App\Http\Controllers\Account\TestimonialController@update')->name('testimonials.update');
        Route::delete('/testimonials/delete/{id}',       'App\Http\Controllers\Account\TestimonialController@delete')->name('testimonials.delete');
        Route::post('/send-message',  'App\Http\Controllers\Account\ChatController@sendMessage');
        Route::get('/load-chat/{id}',  'App\Http\Controllers\Account\ChatController@loadChat');
        Route::get('/load-chat-ajax/{id}',  'App\Http\Controllers\Account\ChatController@loadChatAjx');
        
    });
    

    Route::middleware(['role.admin'])->prefix('admin')->name('admin.')->group(function(){   

        Route::get('/',                         'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
        Route::get('/booking',                  'App\Http\Controllers\Admin\BookingController@index')->name('booking');
        Route::get('/booking/datatable',        'App\Http\Controllers\Admin\BookingController@datatable')->name('booking.datatable');
        Route::post('/booking/update/{id}',     'App\Http\Controllers\Admin\BookingController@update')->name('booking.update');
        Route::delete('/booking/delete/{id}',   'App\Http\Controllers\Admin\BookingController@delete')->name('booking.delete');

        Route::get('/reviews',                  'App\Http\Controllers\Admin\ReviewsController@index')->name('reviews');
        Route::get('/reviews/edit/{id}',        'App\Http\Controllers\Admin\ReviewsController@edit')->name('reviews.edit');
        Route::get('/reviews/datatable',        'App\Http\Controllers\Admin\ReviewsController@datatable')->name('reviews.datatable');
        Route::post('/reviews/update/{id}',     'App\Http\Controllers\Admin\ReviewsController@update')->name('reviews.update');
        Route::delete('/reviews/delete/{id}',   'App\Http\Controllers\Admin\ReviewsController@delete')->name('reviews.delete');

        Route::get('/users',                    'App\Http\Controllers\Admin\UserController@index')->name('users');
        Route::get('/users/datatable',          'App\Http\Controllers\Admin\UserController@datatable')->name('users.datatable');
        Route::get('/users/edit/{id}',          'App\Http\Controllers\Admin\UserController@edit')->name('users.edit');
        Route::post('/users/update/{id}',       'App\Http\Controllers\Admin\UserController@update')->name('users.update');

        Route::get('/testimonials',                'App\Http\Controllers\Admin\TestimonialController@index')->name('testimonials');
        Route::get('/testimonials/edit/{id}',      'App\Http\Controllers\Admin\TestimonialController@edit')->name('testimonials.edit');
        Route::post('/testimonials/update/{id}',   'App\Http\Controllers\Admin\TestimonialController@update')->name('testimonials.update');
        Route::delete('/testimonials/delete/{id}', 'App\Http\Controllers\Admin\TestimonialController@delete')->name('testimonials.delete');
    });
});
