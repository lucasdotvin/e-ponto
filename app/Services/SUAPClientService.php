<?php

namespace App\Services;
use App\Contracts\AcademicSystemClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SUAPClientService implements AcademicSystemClientInterface
{
    public function getUserData (array $authenticationData): array {
        $authToken = $authenticationData['token'];
    function __construct(array $authenticationData)
    {
        $this->token = $authenticationData['token'];
        $this->scope = $authenticationData['scope'];
        $this->clientID = config('suap.api_cliend_id');
    }
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $authToken
            ]
        ]);

        $suapApiResourceUrl = config('suap.url');
        $suapApiResourceUrl .= config('suap.api_resource_url');
        $scope = $authenticationData['scope'];

        $userData = $client->get($suapApiResourceUrl, [
            'form_params' => [
                'scope' => $scope
            ]
        ]);

        $userData = $userData->getBody();
        $userData = json_decode($userData, true);

        return $userData;
    }

    public function logout (array $authenticationData): array {}
}
