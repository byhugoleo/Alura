<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PhpParser\Lexer;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase {
    /** @var Avaliador */
    private $leiloeiro;

    // Executa este código antes cada um dos testes
    protected function setUp(): void {
        echo 'Executando setUp' . PHP_EOL;
        $this->leiloeiro = new Avaliador();
    }

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMaiorValor(Leilao $leilao) {
        // Padrão Arrange-Act-Assert (GiveWhenThen)

        // Arrumo a casa para o teste (Arrange - Given)
        // $this->criaAvaliador(); // Antigo, utiliza setUp

        // Executo o código a ser testado (Act - When)
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->getMaiorValor();

        // Verifico se a saída é a esperada (Assert - Then)
        self::assertEquals(2500, $maiorValor);
    }

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMenorValor(Leilao $leilao) {
        // Padrão Arrange-Act-Assert (GiveWhenThen)

        // Arrumo a casa para o teste (Arrange - Given)
        // $this->criaAvaliador(); // Antigo, utiliza setUp

        // Executo o código a ser testado (Act - When)
        $this->leiloeiro->avalia($leilao);

        $menorValor = $this->leiloeiro->getMenorValor();

        // Verifico se a saída é a esperada (Assert - Then)
        self::assertEquals(1700, $menorValor);
    }

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrar3MaioresValores(Leilao $leilao) {
        // Padrão Arrange-Act-Assert (GiveWhenThen)

        // Arrumo a casa para o teste (Arrange - Given)
        // $this->criaAvaliador(); // Antigo, utiliza setUp

        // Executo o código a ser testado (Act - When)
        $this->leiloeiro->avalia($leilao);

        $maiores = $this->leiloeiro->getMaioresLances();

        // Verifico se a saída é a esperada (Assert - Then)
        self::assertCount(3, $maiores);
        self::assertEquals(2500, $maiores[0]->getValor());
        self::assertEquals(2000, $maiores[1]->getValor());
        self::assertEquals(1700, $maiores[2]->getValor());
    }

    public function testLeilaoFinalizadoNaoPodeSerAvaliado() {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Leilão já finalizado');

        $leilao = new Leilao('Fiat 147 0KM');
        $leilao->recebeLance(new Lance(new Usuario('Teste'), 2000));
        $leilao->finaliza();

        $this->leiloeiro->avalia($leilao);
    }

    public function testLeilaoVazioNaoPodeSerAvaliado() {
        // Fazendo Assert antes do Arrange e do Act
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Não é possível avaliar leilão vazio');
        $leilao = new Leilao('Fusca Azul');
        $this->leiloeiro->avalia($leilao);
    }

    public function leilaoEmOrdemCrescente() {
        echo 'Criando em ordem crescente' . PHP_EOL;
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        return [
            'ordem-crescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemDecrescente() {
        echo 'Criando em ordem decrescente' . PHP_EOL;
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'ordem-descrescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemAleatoria() {
        echo 'Criando em ordem aleatória' . PHP_EOL;
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        return [
            'ordem-aleatoria' => [$leilao]
        ];
    }
}
