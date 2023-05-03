<?php

namespace FireAZ\Clients\Http\Controllers;

use FireAZ\Clients\Repositories\Interfaces\AppAdsInterface;
use FireAZ\Platform\Api;
use FireAZ\Platform\Facades\Jwt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    public function __construct(private AppAdsInterface $appAds)
    {
    }

    public function ads(Request $request)
    {
        // $ads = $request->appClient()->ads;
        return Api::Json([
            'ads' =>  $this->appAds->all()->toArray()
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
