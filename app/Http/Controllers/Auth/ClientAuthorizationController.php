<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthorizationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authenticationData = [
            'token' => request()->input('token'),
            'scope' => request()->input('scope')
        ];

        $client = new \SUAPClient();
        $userData = $client->getUserData($authenticationData);

        $user = User::firstOrCreate([
            'email' => $userData['email'],
            'name' => $userData['nome'],
            'username' => $userData['identificacao'],
        ]);

        return Auth::loginUsingId($user->id);
    }
}
