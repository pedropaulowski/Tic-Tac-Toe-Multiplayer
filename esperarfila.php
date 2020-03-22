<?php
session_start();
require "./classes/jogo.class.php";
require "./classes/fila.class.php";
date_default_timezone_set('America/Sao_Paulo');
$g = new Game();
$f = new Fila();

$hora = date("Y-m-d H:i:s");
$aux = 0;

if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {
    
    $nick = $_SESSION['nick'];
    
    set_time_limit(15);
    
        while(true) {
            session_write_close();
                    $esperando = $f->estaEsperando($nick);

                    if($esperando == 'false') {
                        $player1 = $f->temJogadorEsperando();
                        if($player1 != false) {
                            $f->completarFila($player1, $nick);
                            $jogo = $g->newGame($player1, $nick);
                            $f->msgParaAdversario($player1, $jogo);
                            $arr = array('jogo' => $jogo, 'nome' => $nick);
                            echo json_encode($arr);
                            break;

                        } else if($aux == 0){
                            $f->esperarJogador($nick);
                        } else if($aux > 0){
                            $aux++;
                            if($f->filaFoiCancelada($nick, $hora) == true) {
                                die;
                                exit;
                            } else {
                                $novasmsg = $f->arrayNovasMsgs($nick, $hora);
                                if(count($novasmsg) > 0) {
                                    echo json_encode($novasmsg);    
                                    break;
                                }
                            }
                        }
                    } else {
                        $aux++;
                        if($f->filaFoiCancelada($nick, $hora) == true) {
                            die;
                            exit;
                        } else {
                            $novasmsg = $f->arrayNovasMsgs($nick, $hora);
                            if(count($novasmsg) > 0) {
                                echo json_encode($novasmsg);    
                                break;
                            }
                        }

                    }
                 
        
        }

    

}
