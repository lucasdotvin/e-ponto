<style type="text/css">
    @page {
        font-family: sans-serif;
        margin-bottom: 2cm;
        margin-left: 3cm;
        margin-right: 2cm;
        margin-top: 3cm;
    }

    footer {
        bottom: 0px;
        position: fixed;
    }

    h1,
    p {
        font-size: 16px;
    }
</style>

<div>
    <center>
        <p>
            E-PONTO
        </p>

        <h1>
            Cumprimento de Carga Horária dos Bolsistas em

            {{ $month->format('m/Y') }}
        </h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>
                    Nome de Usuário
                </th>

                <th>
                    Nome
                </th>

                <th>
                    C.H. Cumprida
                </th>
            </tr>
        </thead>
    </table>
</div>

<footer>
    <center>
        <small>
            Documento gerado automaticamente pelo E-Ponto em

            <strong>{{ \Carbon\Carbon::now()->format('d/m/Y h:i:s') }}</strong>.
        </small>
    </center>
</footer>
