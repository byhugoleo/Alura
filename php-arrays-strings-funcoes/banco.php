<?php
    /* include importa outros arquivos, porém que podem não importantes para    
    execução do programa, caso o arquivo não seja encontrado, o mesmo somente
    da um aviso, e não um erro.
    Por isso, nesses casos, pode ser usado require em vez de include
    */
    // include 'funcoes.php'; // Executa normalmente
    /* include 'fun3coes.php'; Executa normalmente, aparecendo somente um aviso que
    não foi encontrado o arquivo
    */
    // require 'fun3coes.php'; // Acusa erro e encerra a execução do programa
    // require 'funcoes.php';
    require_once 'funcoes.php'; // Verifica se o arquivo já não foi incluído

    $contasCorrentes = [
        '10012453455' => [
            'titular' =>  'Hugo',
            'saldo' => 10000
        ],
        '13045325833' => [
            'titular' =>  'Maria',
            'saldo' => 15000
        ],
        '43451243422' => [
            'titular' =>  'Joao',
            'saldo' => 12000
        ] 
    ];

    $chaves = array_keys($contasCorrentes);

    $contasCorrentes[$chaves[0]] = depositar($contasCorrentes[$chaves[0]], 1000);
    $contasCorrentes[$chaves[1]] = depositar($contasCorrentes[$chaves[1]], 1500);
    $contasCorrentes[$chaves[2]] = depositar($contasCorrentes[$chaves[2]], 100);

    for ($i = 0; $i < count($chaves); $i++)
        titularComLetrasMaiusculas($contasCorrentes[$chaves[$i]]);
    
    print PHP_EOL;
    foreach ($contasCorrentes as $cpf => $conta) {
        print $cpf . " " . $contasCorrentes[$cpf]['titular'];
        // print PHP_EOL . $conta['saldo'] . PHP_EOL;
        // Utilizar chaves dentro de "{}" para manusear expressões complexas.
        print PHP_EOL . "{$conta['saldo']}" . PHP_EOL;
    }

    $contasCorrentes[$chaves[0]] = sacar($contasCorrentes[$chaves[0]], 3000);
    $contasCorrentes[$chaves[1]] = sacar($contasCorrentes[$chaves[1]], 11500);

    unset($contasCorrentes[$chaves[0]]); // Remove o elemento da memória, consequentemente do array

    $contasCorrentes[$chaves[2]] = sacar($contasCorrentes[$chaves[2]], 1100);

    print PHP_EOL;
    print "<lu>";
    foreach ($contasCorrentes as $cpf => $conta) {
        exibeConta($conta);
        // É possível explicitar o índice no list quando não é padrão
        list('titular' => $titular, 'saldo' => $saldo) = $conta;
        // ['titular' => $titular, 'saldo' => $saldo] = $conta // PHP 7.1 pra frente
        print "$titular $saldo" . PHP_EOL;

        // print $cpf . " " . $contasCorrentes[$cpf]['titular'];
        // print PHP_EOL . $conta['saldo'] . PHP_EOL;
        // print PHP_EOL . "$conta[saldo]" . PHP_EOL;
        
        // Utilizar chaves dentro de "{}" para manusear expressões complexas.
        // print "{$conta['saldo']}" . PHP_EOL;
    }
    print "</lu>";
?>