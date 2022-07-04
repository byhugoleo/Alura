<?php
    $peso = 70.5;
    $altura = 1.80;
    $imc = number_format($peso / ($altura ** 2), 1);
    print "Meu IMC e " . $imc . PHP_EOL;
    $resposta = match(true) {
        $imc < 18.5 => 'baixo peso.',
        $imc >= 18.5 && $imc < 25 => 'peso normal.',
        $imc >= 25 && $imc < 30 => 'excesso de peso.',
        $imc > 30 && $imc < 35 => 'obesidade.',
        $imc >= 35 => 'obesidade extrema.'
    };
    print $resposta . PHP_EOL;
?>