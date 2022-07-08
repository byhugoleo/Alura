<?php
class Conta {
    // Propriedades
    private Titular $titular;
    private float $saldo;
    private static int $numeroContas = 0;

    // Construtor/Destrutor
    public function __construct(Titular $titular) {
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroContas++;
    }

    public function __destruct() {
        self::$numeroContas--;
    }

    // Getters/Setters
    public function getNomeTitular(): string {
        return $this->titular->getNome();
    }

    public function getCpfTitular(): string {
        return $this->titular->getCpf();
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public static function getNumeroContas(): int {
        return self::$numeroContas;
    }

    // Métodos
    public function sacar(float $valorASacar): void {
        if ($valorASacar > $this->saldo) {
            print 'Não foi possível sacar' . PHP_EOL;
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void {
        if ($valorADepositar < 0) {
            print 'Não foi possível depositar' . PHP_EOL;
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transferir(Conta $conta, float $valorATransferir): void {
        if ($this == $conta) return;
        $saldoAtual = $this->saldo;
        $this->sacar($valorATransferir);
        if ($this->saldo == $saldoAtual) return;
        $conta->depositar($valorATransferir);
    }
}
?>