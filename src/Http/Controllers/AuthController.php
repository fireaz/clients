<?php

namespace FireAZ\Clients\Http\Controllers;

use FireAZ\Platform\Api;
use FireAZ\Platform\Facades\Jwt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all();

        if (!Auth::validate($credentials)) :
            return Api::Json([], ['Invalid Username or Password!'], Api::BAD_REQUEST);
        endif;
        // @var \Illuminate\Contracts\Auth\Authenticatable|null
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        $exp_at = \time() + 60 * 60 * 24; // 24h
        return Api::Json([
            'appClient' => $request->appClient(),
            'user' => $user,
            'token' => Jwt::encode($user->toArray(), ['exp' => $exp_at]),
            'token_exp' => $exp_at
        ]);
    }
    public function me(Request $request)
    {
        return Api::Json([
            'appClient' => $request->appClient(),
            'user' => $request->user(),
        ]);
    }
}
