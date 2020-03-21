<?php
session_start();

require "classes/jogo.class.php";
$g = new Game();

if(isset($_GET['nome']) && !empty($_GET['nome']) && isset($_GET['jogo']) && !empty($_GET['jogo'])){
    $nome = $_GET['nome'];
    $jogo = $_GET['jogo'];

    if($g->isGameOver($jogo) == false) {
        if($g->existeJogo($jogo) == true) {
            if($g->estaNoJogo($jogo, $nome) == true) {
                $player1 = $g->nomePlayer1($jogo);
                $player2 = $g->nomePlayer2($jogo);
                



            } else {
                header("Location: buscarjogo.php");
            }
        } else {
                header("Location: buscarjogo.php");

        }
    } else {
        header("Location: index.php");
    }

} else {
        header("Location: index.php");

}

?>

<html>
<head>
    <link rel="stylesheet" href="geral.css" />
</head>
<body onload="<?php
    if($g->foiIniciado($jogo) == true)
        echo 'carregarJogo()';
    else 
        echo 'comecar();'?>">
    <div class="fluid">
        <div id="player1" class="result <?php
            if($nome == $player1)
                echo 'eu';
        ?>"><?php echo $player1;?></div>
        <div id="jogo" class="result"><?php echo $jogo;?></div>
        <div id="player2" class="result <?php
            if($nome == $player2)
                echo 'eu';
        ?>"><?php echo $player2;?></div>
    </div>
    <div class="fluid">
        <div id="win" class="result"></div>
    </div>
    <div class="fluid">
        <div id="who" class="square who"></div>
    </div>
    <div class="fluid">
        <div class="container">
            <div id="um" class="square" onmouseout="descolorir('um')" onmouseover="colorir('um', 0)" onclick="jogar('um')"></div>
            <div id="dois" class="square" onmouseout="descolorir('dois')" onmouseover="colorir('dois', 0)" onclick="jogar('dois')"></div>
            <div id="tres" class="square" onmouseout="descolorir('tres')" onmouseover="colorir('tres', 0)" onclick="jogar('tres')"></div>
        </div>
        <div class="container">
            <div id="quatro" class="square" onmouseout="descolorir('quatro')" onmouseover="colorir('quatro', 0)" onclick="jogar('quatro')"></div>
            <div id="cinco" class="square" onmouseout="descolorir('cinco')" onmouseover="colorir('cinco', 0)" onclick="jogar('cinco')"></div>
            <div id="seis" class="square" onmouseout="descolorir('seis')" onmouseover="colorir('seis', 0)" onclick="jogar('seis')"></div>
        </div>
        <div class="container">
            <div id="sete" class="square" onmouseout="descolorir('sete')" onmouseover="colorir('sete', 0)" onclick="jogar('sete')"></div>
            <div id="oito" class="square" onmouseout="descolorir('oito')" onmouseover="colorir('oito', 0)" onclick="jogar('oito')"></div>
            <div id="nove" class="square" onmouseout="descolorir('nove')" onmouseover="colorir('nove', 0)" onclick="jogar('nove')"></div>
        </div>
    </div>
</body>
<script type="text/javascript" src="./scripts/script.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="./scripts/load.js"></script>
</html>
