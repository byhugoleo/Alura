<?php
require_once 'config.php';
require_once 'src/Artigo.php';

$artigo = (new Artigo($mysql))->exibirArtigo($_GET['id']);
print_r($_GET);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?=$artigo['titulo'];?>
        </h1>
        <p>
            <?=nl2br($artigo['conteudo']);?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>