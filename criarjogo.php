<?php
require "jogo.class.php";
$g = new Game();

if(isset($_GET['player1']) && isset($_GET['player2'])) {
    $player1 = $_GET['player1'];
    $player2 = $_GET['player2'];

    $jogo = $g->newGame($player1, $player2);

    header('Location: index.php?jogo='.$jogo.'&&nome='.$player1);

}
?>
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form method="GET">
        <div class="form-group">
            <label for="formGroupExampleInput">MEU NICK</label>
            <input type="text" class="form-control" name="player1">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">NICK DO ADVERSARIO</label>
            <input type="text" class="form-control" name="player2">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control">
        </div>
    </form>
    <a href="buscarjogo.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">ENTRAR EM JOGO CRIADO</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
