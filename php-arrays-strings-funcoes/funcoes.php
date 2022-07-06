<?php
    /* Usar & passa o parâmetro por referência, 
    para forçar o uso de um tipo de dado num parâmetro,
    basta informá-lo.
    Há como também explicitar o tipo do retorno.
    */
    function sacar(array $conta, float $valorASacar) : array {
        if ($valorASacar > $conta['saldo'])
            print 'Nao foi possivel sacar' . PHP_EOL;
        else
            $conta['saldo'] -= $valorASacar;
        return $conta;
    }

    function depositar(array $conta, float $valorADepositar) : array {
        if ($valorADepositar > 0)
            $conta['saldo'] += $valorADepositar;
        else
            print 'Nao foi possivel depositar' . PHP_EOL;
        return $conta;
    }

    function titularComLetrasMaiusculas(array &$conta) {
        // Habilitar extensão mbstring no php.ini
        $conta['titular'] = mb_strtoupper($conta['titular']);
    }

    function exibeConta($conta) {
        print "<li> Titular: $conta[titular].</li> <li> Saldo: $conta[saldo]</li>";  
    }
?>