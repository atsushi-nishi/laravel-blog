<?php

//\Route::group(['middleware' => ['blog.values']], function () {
\Route::group(['middleware' => []], function () {
//    \Route::get('/blogs/', 'User\IndexController@index');
    \Route::get('/blogs/', 'Blog\IndexController@index');
    \Route::get('/blogs/{blogId}', 'Blog\IndexController@show');
    /*
    \Route::get('/blogs1/', function () {
        //return view('page/blog/index', ['name' => 'James']);  
        $message = ['a' => 1, 'b' => 2, 'c' => 3];
        echo '<pre>' . var_export($message, true) . '</pre>';
        return view('pages/blog/index', ['name' => 'James']);  
        //return 'OK';
    });
    */
//    \Route::get('/blogs/index', 'Blog\IndexController@index');

});


/*
\Route::group(['middleware' => ['user.values']], function () {
    \Route::get('/', 'User\IndexController@index');

    \Route::group(['middleware' => ['user.guest']], function () {
        \Route::get('signin', 'User\AuthController@getSignIn');
        \Route::post('signin', 'User\AuthController@postSignIn');

        \Route::get('signin/facebook', 'User\FacebookServiceAuthController@redirect');
        \Route::get('signin/facebook/callback', 'User\FacebookServiceAuthController@callback');

        \Route::get('forgot-password', 'User\PasswordController@getForgotPassword');
        \Route::post('forgot-password', 'User\PasswordController@postForgotPassword');

        \Route::get('reset-password/{token}', 'User\PasswordController@getResetPassword');
        \Route::post('reset-password', 'User\PasswordController@postResetPassword');

        \Route::get('signup', 'User\AuthController@getSignUp');
        \Route::post('signup', 'User\AuthController@postSignUp');

    });

    \Route::group(['middleware' => ['user.auth']], function () {

    });
});
*/
