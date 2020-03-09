<?php
require "jogo.class.php";
$g = new Game();

if(isset($_GET['player1']) && isset($_GET['player1'])) {
    $player1 = $_GET['player1'];
    $player2 = $_GET['player2'];

    $jogo = $g->newGame($player1, $player2);

    header('Location: index.php?jogo='.$jogo.'nome='.$player1);

} else {
    header('Location: criarjogo.php');
}
?>
<form method="GET">
    EU:
    <input type="text" name="player1"/>
    ADVERSARIO:
    <input type="text" name="player2"/>

    <input type="submit" value="submit"/>
</form>
