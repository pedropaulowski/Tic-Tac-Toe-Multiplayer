<?php
session_start();
require "./classes/jogo.class.php";
require "./classes/fila.class.php";
date_default_timezone_set('America/Sao_Paulo');
$g = new Game();
$f = new Fila();

$hora = date("Y-m-d H:i:s");



if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {
    $nick = $_SESSION['nick'];
    set_time_limit(60);
    
        while(true) {
            session_write_close();
            if($f->estaEsperando($nick)) {
                $arr = $f->arrayNovasMsgs($nick, $hora);
                if($arr != false) {
                    break;
                } else {
                    sleep(0.5);
                }
                

            } else {
                $player1 = $f->temJogadorEsperando();
                if($player1 != false) {
                    $f->completarFila($player1, $nick);
                    $jogo = $g->newGame($player1, $nick);
                    $f->msgParaAdversario($player1, $jogo);
                    $arr = array('jogo' => $jogo, 'nome' => $nick);
                    break;

                } else {
                    $f->esperarJogador($nick);
                }
                sleep(2);
            }
        }

    echo json_encode($arr);

}
