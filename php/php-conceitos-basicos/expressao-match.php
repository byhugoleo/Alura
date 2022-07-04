<?php
    $x = 4;
    $y = 3;
    $operacao = 'multiplicacao';
    $resposta = match ($operacao) {
        'adicao' => $x + $y,
        'multiplicacao' => $x * $y,
        'divisao' => $x / $y,
    };
    var_dump($resposta);
?>