<?php
session_start();

require "jogo.class.php";
$g = new Game();

$jogo = $_GET['jogo'];
if($_GET['waiting']== 'true'){
    //$arr = array('gameOver' => false, 'number' => 'cinco');
    set_time_limit(60);
   // while(true) {
        session_write_close();
        if($_SESSION["$jogo"]['jogada'] != json_decode($_GET['jogada'], true)){
            
            $jogada = json_decode($_GET['jogada']);
            $arr = array('get' => $jogada , 'session' => $_SESSION[$jogo]['jogada']);
            echo'<pre>';
            print_r($jogada).'<br>';
            print_r($_SESSION[$jogo]['jogada']).'<br>';
            session_write_close();
            
            //break;
        } else {
          //  sleep(2);
        }
   // }

   print_r(json_decode($_GET['jogada'], true)).'<br>';
   print_r($_SESSION[$jogo]['jogada']).'<br>';


}else {
    unset($_SESSION[$jogo]['jogada']);
    session_write_close();
    session_start();
    $arr = array('gameOver' => $_GET['gameOver'], 'number' => $_GET['number']);
    $_SESSION[$jogo]['jogada'] = $arr;
    $_POST['jogada'] = $arr;
}

//echo json_encode($arr);