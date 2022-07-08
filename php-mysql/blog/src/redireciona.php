<?php
function redireciona(string $url): void {
    // POST Redirect GET
    // Redireciona a página
    header("Location: $url");
    die();
}
?>