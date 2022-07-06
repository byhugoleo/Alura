<?php
    // $idades = array(16, 17, 54, 23, 45, 22, 18, 19, 15, 14, 29);
    // Versões mais novas permite criar um array sem a necessidade de escrever array()
    $idades = [16, 17, 54, 23, 45, 22, 18, 19, 15, 14, 29];
    list($idadeMaria, $idadeFernando) = $idades; // Irá pegar as idades relacionadas aos índices 0 e 1
    $tamanhoIdades = count($idades);
    for ($i = 0; $i < $tamanhoIdades; $i++)
        print "Idade $i = $idades[$i]" . PHP_EOL; 
?>