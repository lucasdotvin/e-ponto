<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ClientLogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $authenticationData = [
            'token' => session('token'),
            'scope' => session('scope')
        ];

        $client = new \SUAPClient($authenticationData);
        $client->logout();

        Auth::logout();
        Cookie::queue(
            Cookie::forget('suapToken')
        );

        return redirect('authorize');
    }
}
