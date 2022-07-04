<?php
    $idade = 23;
    // É usado '.' para concatenar strings
    print 'Ola mundo! Tenho ' . $idade . " anos.";

    // Aspas simples imprime o texto de forma literal
    /* Aspas duplas verifica a string a ser imprimida, 
        se há alguma variável ou caractere especial*/
    print "Ola mundo! Tenho $idade anos.";

    // Quebra de linha "\n" ou PHP_EOL
    /* PHP_EOL é funcional em diferentes plataformas
        que adotam tipos diferente de quebra de linha*/
    print "\nOla mundo! Tenho $idade anos.";
    print PHP_EOL . "Ola mundo! Tenho $idade anos.";
?>