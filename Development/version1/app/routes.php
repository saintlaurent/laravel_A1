<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello');
});

Route::get('/mailer', function()
{
    return View::make('mailerTester');
});

Route::group(array('before' => 'guest'), function(){
   
    // CSRF protection
    Route::group(array('before' => 'csrf'), function(){
        
        // post
        Route::post('/create', 'AccountController@postCreate'); 
        Route::post('/loginTest', 'AccountController@postSignin'); 
    });
    
    // get
    Route::get('/create', array(
        'as' => 'create-account',
        'uses' => 'AccountController@getCreate'
    ));
    Route::get('/loginTest', array(
        'as' => 'sign-in',
        'uses' => 'AccountController@getSignin'
    ));
});

Route::get('/account/logout', function(){
    Auth::logout();
    return "logout successfully";
});

Route::get('/account/activation/{token}', array(
    'as' => 'account-activation',
    'uses' => 'AccountController@initialActivation'
));

//Route::get('/create', function(){
//    return View::make('users/create');
//});