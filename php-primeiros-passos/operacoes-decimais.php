<?php
    function saldo(array $debitos, array $creditos) {
        return array_sum($creditos) - array_sum($debitos);
    }

    $debitos = Array();
    $creditos = Array();

    array_push($debitos, 0.1);
    array_push($debitos, 0.2);
    array_push($creditos, 0.3);

    // O problema é resolvido caso usarmos valores inteiros em vez de float
    // array_push($debitos, 10);
    // array_push($debitos, 20);
    // array_push($creditos, 30);

    print "debitos\n";
    for ($i = 0; $i < sizeof($debitos); $i++)
        print 'R$' . number_format($debitos[$i], 2, ',', '') . "\n";
    print "\ncreditos\n";
    for ($i = 0; $i < sizeof($creditos); $i++)
        print 'R$' . number_format($creditos[$i], 2, ',', '') . "\n";
        
    $saldo = saldo($debitos, $creditos);
    print "\nsaldo\n";
    // Resultado esperado seria 0, porém esse é mostrado R$-5.5511151231258E-17
    print 'R$' . $saldo . "\n";
?>