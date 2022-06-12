<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
})->name('welcome');


Auth::routes();


// Google Login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Facebook Login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware'=>'auth','middleware'=>'admin'],function(){
    Route::resource('user', 'UserController', ['except' => ['show']]);
});
Route::group(['middleware'=>'auth','middleware'=>'admin'],function(){
    Route::resource('owner','OwnerController');
});


Route::group(['middleware'=>'auth','middleware'=>'admin'],function (){
    Route::resource('college_speciality','CollegeSpecialityController');
});

Route::group(['middleware'=>'auth','middleware'=>'admin'],function (){
    Route::resource('state','StateController');
});

Route::group(['middleware'=>'auth','middleware'=>'admin'],function (){
    Route::resource('place','PlaceController');

});

Route::group(['middleware'=>'auth'],function (){
    Route::resource('house','HouseController');
    Route::post('search','HouseController@search')->name('house.search');
    Route::post('search2','HouseController@search2')->name('house.search2');
    Route::get('house_users/{users_searches}','HouseController@viewUsers')
        ->name('house.users');

}

);

Route::group(['middleware'=>'auth'],function (){
    Route::resource('favorite','FavoriteController');
});

Route::group(['middleware'=>'auth'],function (){
    Route::resource('appointment','AppointmentController');
    Route::get('appointment/add/{appointment_request}','AppointmentController@createAppointment')
        ->name('appointment.createAppointment');
    Route::post('appointment/save/{appointment_request}','AppointmentController@storeAppointment')
        ->name('appointment.storeAppointment');
});

Route::group(['middleware'=>'auth'],function (){
    Route::resource('search_history','HouseSearchWithColleaguesController');
    Route::get('user_search_history','HouseSearchWithColleaguesController@index2')
        ->name('search_history.index2');
    Route::delete('user_search_history/{search}','HouseSearchWithColleaguesController@destroy2')
        ->name('search_history.destroy2');
});