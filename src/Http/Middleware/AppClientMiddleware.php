<?php

namespace FireAZ\Clients\Http\Middleware;

use Closure;
use FireAZ\Clients\Repositories\Interfaces\AppClientInterface;
use FireAZ\Platform\Facades\Jwt;
use Illuminate\Http\Request;

class AppClientMiddleware
{
    public function __construct(private AppClientInterface $appClientInterface)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $clientId = $request->header('clientId');
        $clientKey = $request->header('clientKey');
        $appClient =  $this->appClientInterface->getFirstBy(['client_id' => $clientId, 'client_key' => $clientKey]);
        $token = $request->bearerToken();
        if ($token) {
            $user = Jwt::decode($token,false);
            $request->setUserResolver(function () use ($user) {
                return $user;
            });
        }

        $request->macro('appClient', function () use ($appClient) {
            return $appClient;
        });
        return $next($request);
    }
}
