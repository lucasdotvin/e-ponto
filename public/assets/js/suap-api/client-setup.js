document.addEventListener('DOMContentLoaded', function (event) {
    let $suapLoginButton = document.querySelector(
        '[data-role="suap-login-button"]'
    );

    let client = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI);
    client.init();

    $suapLoginButton.setAttribute('href', client.getLoginURL());

    if (client.isAuthenticated()) {
        console.log(client.getToken());

        $.ajax({
            url: '/api/authorize',
            data: {
                'token': client.getToken().getValue()
            },
            type: 'POST',

            success: function () {
                // window.location.reload();
            }
        });
    } else {
        let $authorizationMessage = document.querySelector(
            '[data-role="authorization-message"]'
        );

        $authorizationMessage.classList.remove('is-hidden');
    }

    $suapLoginButton.classList.remove('is-loading');
});
