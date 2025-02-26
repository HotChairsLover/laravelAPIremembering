<?php
use Illuminate\Support\Facades\Route;
$authApiNamespace = [
    'namespace' => 'App\Http\Controllers\Auth'
];

Route::group($authApiNamespace, function () {
    Route::post('login', 'UserAuthController@login')->name('api.auth.login');
    Route::post('register', 'UserAuthController@register')->name('api.auth.register');
    Route::post('logout', 'UserAuthController@logout')->name('api.auth.logout');
});
