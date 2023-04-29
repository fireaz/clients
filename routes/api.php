<?php

use FireAZ\Platform\Facades\Jwt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', function (Request $request) {
    $credentials = $request->all();

    if (!Auth::validate($credentials)) :
        return redirect()->to('login')
            ->withErrors(trans('auth.failed'));
    endif;
    // @var \Illuminate\Contracts\Auth\Authenticatable|null
    $user = Auth::getProvider()->retrieveByCredentials($credentials);
    $exp_at = \time() + 60 * 60 * 24; // 24h
    return ['appClient' => $request->appClient(), 'user' => $user, 'token' => Jwt::encode($user->toArray(), ['exp' => $exp_at]), 'token_exp' => $exp_at];
});
