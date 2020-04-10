<?php

namespace App\Services;

use Auth;

class RoleService
{
    /**
     * Retorna a função do usuário atual.
     *
     * @return string
     **/
    public function current()
    {
        $currentRole = Auth::user()->role->slug;

        return $currentRole;
    }

    /**
     * Verifica se uma dada função é igual à do usuário atual.
     * 
     * Trata-se de uma função auxiliadora para a expressão booleana
     * $wantedRole === Role::current()
     *
     * @param string $wantedRole Função a comparar com a do usuário atual.
     * @return bool
     **/
    public function currentIs(string $wantedRole)
    {
        $currentRole = $this->current();
        $currentRoleIsEqualToWantedRole = ($currentRole === $wantedRole);

        return $currentRoleIsEqualToWantedRole;
    }
}
