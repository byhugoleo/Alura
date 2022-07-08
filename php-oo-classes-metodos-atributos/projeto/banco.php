<?php
require_once 'src/Conta.php';
require_once 'src/Titular.php';

$c = new Conta(new Titular('123.456.789-10', 'Teste'));
$c2 = new Conta(new Titular('987.654.321-01', 'Teste 2'));
// var_dump($c, $c2);

$c->depositar(10000);
$c->transferir($c, 1000);

print_r($c);
print_r($c2);
new Conta(new Titular('847.343.213-42', 'Teste3'));
print Conta::getNumeroContas() . PHP_EOL;
print "{$c->getCpfTitular()}" . PHP_EOL;
?>
