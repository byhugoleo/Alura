<?php
    /* É possível criar arrays associativos, no qual o índice é representado com uma chave
        do tipo string ou inteiro, caso informado outro tipo de chave
        a mesma é convertida
        https://www.php.net/manual/pt_BR/language.types.array.php
        https://www.php.net/manual/pt_BR/types.comparisons.php
    */
    $contasCorrentes = [
        '10012453455' => [
            'titular' =>  'Hugo',
            'saldo' => 1000
        ],
        '13045325833' => [
            'titular' =>  'Maria',
            'saldo' => 1000
        ],
        '43451243422' => [
            'titular' =>  'Joao',
            'saldo' => 1000
        ]
    ];

    // Quando usado & o valor é passado por referência, sendo possível alterar o valor
    foreach ($contasCorrentes as &$conta)
        print $conta['titular'] . PHP_EOL;
    
    // Porém a referência é mantida na última posição acessador do array
    // É utilizado unset para remover essa referência e não sofrer alterações acidentais
    unset($conta);
    /* Sem utilizar unset a saída fica da seguinte forma.
        Hugo
        Maria
        Maria
        Pois no foreach $conta recebe o valor de $contasCorrentes a cada iteração
        https://www.php.net/manual/pt_BR/control-structures.foreach.php
    */
    foreach ($contasCorrentes as $cpf => $conta) {
        print $contasCorrentes[$cpf]['titular'] . PHP_EOL; 
        print_r($conta); // Imprime qualquer tipo de variável de forma legível
    }
?>