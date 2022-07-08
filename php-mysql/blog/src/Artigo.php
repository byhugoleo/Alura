<?php
class Artigo {
    // Construtor
    public function __construct(
        // Constructor property promotion, disponível no PHP 8
        private mysqli $mysql
    ) {}

    // Métodos
    public function exibirArtigos(): array {
        $resultado = $this->mysql->query('select id, titulo, conteudo from artigos;');
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function exibirArtigo(string $id): array {
        // prepare, prepara a query para inserção de dados
        $selecionaArtigo = $this->mysql->prepare('select titulo, conteudo from artigos where id = ?;');
        // bind_param atribui os dados à query em cada '?'
        $selecionaArtigo->bind_param('s', $id);
        // execute executa a query
        $selecionaArtigo->execute();
        // get_result pega os resultados executados pela query e fetch formata os dados para PHP
        return $selecionaArtigo->get_result()->fetch_assoc();
    }

    public function salvarArtigo(string $titulo, string $conteudo): void {
        $salvarArtigo = $this->mysql->prepare('insert into artigos (titulo, conteudo) values (?, ?);');
        $salvarArtigo->bind_param('ss', $titulo, $conteudo);
        $salvarArtigo->execute();   
    }

    public function excluirArtigo(string $id): void {
        $excluirArtigo = $this->mysql->prepare('delete from artigos where id = ?;');
        $excluirArtigo->bind_param('s', $id);
        $excluirArtigo->execute();
    }

    public function editarArtigo(string $id, string $titulo, string $conteudo): void {
        $editarArtigo = $this->mysql->prepare('update artigos set titulo = ?, conteudo = ? where id = ?;');
        $editarArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editarArtigo->execute();
    }
}
?>