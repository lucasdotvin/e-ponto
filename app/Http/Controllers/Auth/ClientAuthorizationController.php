<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthorizationController extends Controller
{
    /**
     * Retrieve user data from SUAP API
     *
     * @param string $authToken
     * @return array
     **/
    private function retrieveUserData(string $authToken, string $scope)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $authToken
            ]
        ]);

        $suapApiResourceUrl = config('suap.url');
        $suapApiResourceUrl .= config('suap.api_resource_url');

        $userData = $client->get($suapApiResourceUrl, [
            'form_params' => [
                'scope' => $scope
            ]
        ]);

        $userData = $userData->getBody();
        $userData = json_decode($userData, true);

        return $userData;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authToken = $request->input('token');
        $scope = $request->input('scope');

        $apiData = $this->retrieveUserData($authToken, $scope);

        $user = User::firstOrCreate([
            'email' => $apiData['email'],
            'name' => $apiData['nome'],
            'username' => $apiData['identificacao'],
        ]);

        return Auth::loginUsingId($user->id);
    }
}
