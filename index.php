<?php
session_start();

require "jogo.class.php";
$g = new Game();


if(isset($_GET['nome']) && !empty($_GET['nome']) && isset($_GET['jogo']) && !empty($_GET['jogo'])){
    $nome = $_GET['nome'];
    $jogo = $_GET['jogo'];

    if($g->existeJogo($jogo) == true) {
        if($g->estaNoJogo($jogo, $nome) == true) {
            $player1 = $g->nomePlayer1($jogo);
            $player2 = $g->nomePlayer2($jogo);

        } else {
            header('Location: criarjogo.php');
        }
    } else {
        header('Location: criarjogo.php');
    }
} else {
    header('Location: buscarjogo.php');
}
?>

<html>
<head>
    <link rel="stylesheet" href="geral.css" />
</head>
<body onload="comecar()">
    <div class="fluid">
        <div id="<?php
            if($nome == $player1)
                echo 'player1 me';
            else 
                echo 'player1';
        ?>" class="result"><?php echo $player1;?></div>
        <div id="<?php
            if($nome == $player2)
                echo 'player2 me';
            else 
                echo 'player2';
        ?>" class="result"><?php echo $player2;?></div>
    </div>
    <div class="fluid">
        <div id="win" class="result"></div>
    </div>
    <div class="fluid">
        <div id="who" class="square who"></div>
    </div>
    <div class="fluid">
        <div class="container">
            <div id="um" class="square" onmouseout="descolorir('um')" onmouseover="colorir('um')" onclick="jogar('um')"></div>
            <div id="dois" class="square" onmouseout="descolorir('dois')" onmouseover="colorir('dois')" onclick="jogar('dois')"></div>
            <div id="tres" class="square" onmouseout="descolorir('tres')" onmouseover="colorir('tres')" onclick="jogar('tres')"></div>
        </div>
        <div class="container">
            <div id="quatro" class="square" onmouseout="descolorir('quatro')" onmouseover="colorir('quatro')" onclick="jogar('quatro')"></div>
            <div id="cinco" class="square" onmouseout="descolorir('cinco')" onmouseover="colorir('cinco')" onclick="jogar('cinco')"></div>
            <div id="seis" class="square" onmouseout="descolorir('seis')" onmouseover="colorir('seis')" onclick="jogar('seis')"></div>
        </div>
        <div class="container">
            <div id="sete" class="square" onmouseout="descolorir('sete')" onmouseover="colorir('sete')" onclick="jogar('sete')"></div>
            <div id="oito" class="square" onmouseout="descolorir('oito')" onmouseover="colorir('oito')" onclick="jogar('oito')"></div>
            <div id="nove" class="square" onmouseout="descolorir('nove')" onmouseover="colorir('nove')" onclick="jogar('nove')"></div>
        </div>
    </div>
</body>
<script type="text/javascript" src="script.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</html>
<?php

?>