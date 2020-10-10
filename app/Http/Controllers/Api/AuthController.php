<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\ApiAuthRequest;

class AuthController extends Controller
{
    /**
     * This route must be `login`
     *
     * sudo netstat -lpn |grep :8000
     * tcp        0      0 127.0.0.1:8000          0.0.0.0:*               LISTEN      2191/php7.3
     * kill 2191
     *
     * @param Request $request
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login(ApiAuthRequest $request)
    {
        $data = Config::get('services.passport') + [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];
        $response = $request->create('/oauth/token', 'POST', $data);

        return app()->handle($response);
    }

    /**
     * Get user info
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfo()
    {
        return response()->json(auth()->user());
    }
}
