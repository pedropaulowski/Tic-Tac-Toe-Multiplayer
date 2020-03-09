<?php
require "jogo.class.php";
$g = new Game();

if(isset($_GET['jogo']) && isset($_GET['nome'])) {
    $jogo = $_GET['jogo'];
    $nome = $_GET['nome'];

    if($g->existeJogo($jogo) == true) {
        if($g->estaNoJogo($jogo,$nome) == true) {
            header('Location: index.php?jogo='.$jogo.'&&nome='.$nome);

        } else {
            header('Location: criarjogo.php');
        }
    } else {
        header('Location: criarjogo.php');
    }
} else {
    header('Location: criarjogo.php');
}
?>
<form method="GET">
    JOGO:
    <input type="text" name="jogo"/>
    Nome:
    <input type="text" name="nome"/>
    <input type="submit" value="submit"/>
</form>