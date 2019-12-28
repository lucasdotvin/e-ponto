<?php

return [
    'api_cliend_id' => env('SUAP_API_CLIENT_ID'),
    'api_client_secret' => env('SUAP_API_CLIENT_SECRET'),
    'api_redirect_uri' => env('SUAP_API_REDIRECT_URI'),

    'api_resource_url' => '/api/eu/',
    'oauth_logout_url' => '/o/revoke_token/',
    'url' => 'https://suap.ifrn.edu.br',
];
