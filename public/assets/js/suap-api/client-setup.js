document.addEventListener('DOMContentLoaded', function (event) {
    let $suapLoginButton = document.querySelector(
        '[data-role="suap-login-button"]'
    );

    let client = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI);
    client.init();

    $suapLoginButton.setAttribute('href', client.getLoginURL());
});
