<?php

namespace FireAZ\Clients\Http\Controllers;

use FireAZ\Platform\Api;
use FireAZ\Platform\Facades\Jwt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{

    public function ads(Request $request)
    {
        $ads = $request->appClient()->ads;
        return Api::Json([
            'ads' =>  $ads
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
