<?php

Route::group(['prefix' => 'admin-panel'], function () {

    \Illuminate\Support\Facades\Config::set('auth.defines', 'admin');

    Route::get('/login', 'AdminAuth@login')->name('admin.login');
    Route::post('/login', 'AdminAuth@doLogin')->name('admin.do_login');
    Route::get('forgot-password', 'AdminAuth@forgotPassword')->name('admin.forgotPassword');
    Route::post('set-password', 'AdminAuth@setPassword')->name('admin.setPassword');
    Route::get('reset-password/{token}', 'AdminAuth@resetPassword')->name('admin.resetPassword');
    Route::any('reset-NewPassword/{token}', 'AdminAuth@setNewPassword')->name('admin.setNewPassword');

    Route::group(['middleware' => 'admin:admin'], function () {

        Route::get('logout', 'AdminAuth@logout')->name('admin.logout');
        Route::get('/', function () {

            return view('admin.index');
        });
        Route::get('admins/dataTable', 'AdminsController@dataTable')->name('admins.dataTable');
        Route::resource('admins', 'AdminsController')->except('show');

        Route::get('lang/{lang}', function ($lang) {

            session()->has('lang') ? session()->forget('lang') : '';


            $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');

            return back();


        });

    });


});
