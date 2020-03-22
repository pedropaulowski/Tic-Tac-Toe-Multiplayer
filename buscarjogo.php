<?php

session_start();

require "classes/jogo.class.php";
$g = new Game();

if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {
    if(isset($_GET['jogo']) ) {
        $jogo = $_GET['jogo'];
        $nome = $_SESSION['nick'];

        if($g->existeJogo($jogo) == true) {
            if($g->estaNoJogo($jogo,$nome) == true) {
                header('Location: jogo.php?jogo='.$jogo.'&&nome='.$nome);

            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    }
} else {
    header("Location: login.php");
}
?>
<head>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
    <h6>Certifique de que seu adversário digitou seu nick corretamente</h6>
    <form method="GET">
        <div class="form-group">
            <label for="formGroupExampleInput">CODIGO DO JOGO</label>
            <input type="text" class="form-control" name="jogo">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value="ENTRAR">
        </div>
    </form>
    <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">CRIE SUA PARTIDA</a>
    <a id="fila" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">FILA</a>
    <a id="cancelar" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">SAIR DA FILA</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./scripts/fila.js"></script>
</body>