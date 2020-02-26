@extends('layouts.content-with-navbar')

@section('title', 'Dashboard')

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Boas-Vindas!
        </h2>

        <main class="content">
            <p>
                Sua conta não foi associada a nenhuma das funções deste sistema.
                Caso acredite que isso se trata de um equívoco, procure o serviço social.
                Outras dúvidas podem ser encaminhadas ao seguinte e-mail:

            </p>

            <p class="has-text-right is-italic">
                Equipe do E-Ponto.
            </p>
        </main>
    </div>
@endsection
