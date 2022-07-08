<?php
class Titular
{
    // Propriedades
    private string $cpf;
    private string $nome;

    // Construtor
    public function __construct(string $cpf, string $nome) {
        $this->cpf = $cpf;
        $this->nome = $nome;
    }

    // Getters/Setters
    public function getCpf(): string {
        return $this->cpf;
    }

    public function getNome(): string {
        return $this->nome;
    }
}
?>