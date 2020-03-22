<?php
session_start();

require "classes/jogo.class.php";
$g = new Game();

if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {
    if(isset($_GET['player1']) && isset($_GET['player2'])) {
        $player1 = $_GET['player1'];
        $player2 = $_GET['player2'];

        $jogo = $g->newGame($player1, $player2);

        header('Location: jogo.php?jogo='.$jogo.'&&nome='.$player1);

    }
} else {
    header('Location: login.php');
}
?>
<head>
    
    <meta charset="utf-8"/>
    <meta name="keywords" content="Jogo da velha, Jogo da velha multiplayer, Jogo da velha online">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no" />
	<meta http-equiv="content-language" content="pt-br">
	<link rel="canonical" href="matematica.gq/index.html">
	<meta name="description" content="Jogo da velha online multiplayer, jogue agora">
	<meta name="author" content="Pedro Paulo">
	<title>Jogo da Velha</title>
	<meta itemprop="name" content="Jogo da Velha">
	<meta itemprop="description" content="Jogo da velha online multiplayer, jogue agora">
	<meta property="og:description" content="Jogo da velha online multiplayer, jogue agora">
	<meta property="og:title" content="Jogo da Velha">
	<meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="game"/>
    <meta property="og:site_name" content="Jogo da Velha"/>
    <meta property="og:url" content="http://jogodavelha.gq/index.php"/>
    <meta property="twitter:card" content="summary_large_image"/>
    <meta property="twitter:title" content="Jogo da Velha">
    <meta property="fb:app_id" content="1045418415840390">
    <meta property="twitter:description" content="Jogo da velha online multiplayer, jogue agora"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h6>Certifique - se  de escrever o nick/nome do adversario corretamente</h6>
    <form method="GET">
        <div class="form-group">
            <label id="nick" for="formGroupExampleInput"><?php echo $_SESSION['nick'];?></label>
            <input type="text" class="form-control" name="player1" value="<?php echo $_SESSION['nick'];?>">

        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">NICK/NOME DO ADVERSARIO</label>
            <input type="text" class="form-control" name="player2">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value = "CRIAR PARTIDA">
        </div>
    </form>
    <a href="buscarjogo.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">ENTRAR EM JOGO CRIADO</a>
    <a id="fila" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">FILA</a>
    <a id="cancelar" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">SAIR DA FILA</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <script type="text/javascript" src="./scripts/fila.js"></script>

</body>
