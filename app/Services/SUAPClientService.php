<?php

namespace App\Services;
use App\Contracts\AcademicSystemClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SUAPClientService implements AcademicSystemClientInterface
{
    function __construct(array $authenticationData)
    {
        $this->token = $authenticationData['token'];
        $this->scope = $authenticationData['scope'];
        $this->clientID = config('suap.api_cliend_id');
    }

    /**
     * Create Guzzle client.
     *
     * @return Client
     * @author 
     **/
    private function getClient()
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->token
            ]
        ]);

        return $client;
    }

    public function getUserData(): array
    {
        $client = $this->getClient();
        $suapApiResourceUrl = config('suap.url');
        $suapApiResourceUrl .= config('suap.api_resource_url');

        $userData = $client->get($suapApiResourceUrl, [
            'form_params' => [
                'scope' => $this->scope
            ]
        ]);

        $userData = $userData->getBody();
        $userData = json_decode($userData, true);

        return $userData;
    }

    public function logout()
    {
        $client = $this->getClient();
        $suapApiLogoutUrl = config('suap.url');
        $suapApiLogoutUrl .= config('suap.oauth_logout_url');

        $client->post($suapApiLogoutUrl, [
            'form_params' => [
                'token' => $this->token,
                'client_id' => $this->clientID
            ]
        ]);
    }
}
