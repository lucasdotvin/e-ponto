<?php

namespace App\Contracts;

interface AcademicSystemClientInterface
{
    /**
     * Coleta os dados do usuário no sistema.
     *
     * @param array $authenticationData Dados de autenticação do usuário.
     * @return array|bool Dados do usuário ou false em caso de erro.
     **/
    public function getUserData (array $authenticationData): array;

    /**
     * Faz logout no sistema.
     *
     * @param array $authenticationData Dados de autenticação do usuário.
     * @return bool Sucesso da operação.
     **/
    public function logout (array $authenticationData): array;
}
