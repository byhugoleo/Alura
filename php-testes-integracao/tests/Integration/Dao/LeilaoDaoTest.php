<?php
namespace Alura\Leilao\Tests\Integration\Dao;

use Alura\Leilao\Dao\Leilao as LeilaoDao;
use Alura\Leilao\Model\Leilao;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase {
    static \PDO $pdo;

    public static function setUpBeforeClass(): void {
        self::$pdo = new \PDO('sqlite::memory:');
        $sql = 'CREATE TABLE leiloes (
            id INTEGER PRIMARY KEY,  
            descricao TEXT,
            finalizado BOOL,  
            dataInicio TEXT
        );';
        self::$pdo->exec($sql);
    }

    protected function setUp(): void {
        self::$pdo->beginTransaction();
    }

    /**
     * @dataProvider leiloes
     */
    public function testBuscaLeiloesNaoFinalizados(array $leiloes) {
        // arrange
        $leilaoDao = new LeilaoDao(self::$pdo);
        foreach ($leiloes as $leilao) {
            $leilaoDao->salva($leilao);
        }

        // act
        $leiloes = $leilaoDao->recuperarNaoFinalizados();

        // assert
        self::assertCount(1, $leiloes);
        self::assertContainsOnlyInstancesOf(Leilao::class, $leiloes);
        self::assertSame(
            'Variante 0Km',
            $leiloes[0]->recuperarDescricao()
        );
        self::assertFalse($leiloes[0]->estaFinalizado());
    }

    /**
     * @dataProvider leiloes
     */
    public function testBuscaLeiloesFinalizados(array $leiloes) {
        // arrange
        $leilaoDao = new LeilaoDao(self::$pdo);
        foreach ($leiloes as $leilao) {
            $leilaoDao->salva($leilao);
        }

        // act
        $leiloes = $leilaoDao->recuperarFinalizados();

        // assert
        self::assertCount(1, $leiloes);
        self::assertContainsOnlyInstancesOf(Leilao::class, $leiloes);
        self::assertSame(
            'Fiat 147 0Km',
            $leiloes[0]->recuperarDescricao()
        );
        self::assertTrue($leiloes[0]->estaFinalizado());
    }

    public function testAoAtualizarLeilaoStatusDeveSerAlterado(): void {
        // arrange
        $leilao = new Leilao('Brasilia Amarela');
        $leilaoDao = new LeilaoDao(self::$pdo);
        $leilao = $leilaoDao->salva($leilao);
        /* assert intermediário, quebra o padrão aaa (arrange, act, assert)
        $leiloes = $leilaoDao->recuperarNaoFinalizados();
        self::assertCount(1, $leiloes);
        self::assertSame('Brasilia Amarela', $leiloes[0]->recuperarDescricao());
        self::assertFalse($leiloes[0]->estaFinalizado());
        */
        $leilao->finaliza();

        // act
        $leilaoDao->atualiza($leilao);
        
        // assert
        $leiloes = $leilaoDao->recuperarFinalizados();
        self::assertCount(1, $leiloes);
        self::assertSame('Brasilia Amarela', $leiloes[0]->recuperarDescricao());
        self::assertTrue($leiloes[0]->estaFinalizado());
    }

    protected function tearDown(): void {
        self::$pdo->rollBack();
    }

    public function leiloes() {
        $naoFinalizado = new Leilao('Variante 0Km');
        $finalizado = new Leilao('Fiat 147 0Km');
        $finalizado->finaliza();

        return [
            [
                [$naoFinalizado, $finalizado]
            ]
        ];
    }
}
?>