<?php

class Game{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=jogodavelha;host=localhost", "root", "");    
    }

    public function novaJogada($jogo, $numero, $player, $gameOver) {
        $hora = date('Y-m-d H:i:s');

        $sql = "INSERT INTO jogadas (jogo, numero, player, gameOver, hora) VALUES (:jogo, :numero, :player, :gameOver, :hora)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->bindValue(":numero", $numero);
        $sql->bindValue(":player", $player);
        $sql->bindValue(":gameOver", $gameOver);
        $sql->bindValue(":hora", $hora);
        $sql->execute();

        $arr = array('hora' => $hora);
        return $arr;
    }

    public function arrayNovaJogada($jogo, $hora) {
        $sql = "SELECT * FROM jogadas WHERE jogo = :jogo AND hora > :hora";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->bindValue(":hora", $hora);
        $sql->execute();

        if($sql -> rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            $arr = array('number' => $sql['numero'], 'gameOver' => $sql['gameOver']);
            return $arr;
        } else {
            return array();
        }
    }

    public function newGame($player1, $player2){
        $data = date("Y-m-d H:i:s");
        $jogo = md5($player1.$player2.$data);
        $sql = "INSERT INTO jogos (jogo, player1, player2) VALUES (:jogo, :player1, :player2)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->bindValue(":player1", $player1);
        $sql->bindValue(":player2", $player2);
        $sql->execute();

        return $jogo;
        
    }

    public function existeJogo($jogo) {
        $sql = "SELECT * FROM jogos WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();
        if($sql ->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function estaNoJogo($jogo, $nome) {
        $sql = "SELECT * FROM jogos WHERE jogo = :jogo AND player1 = :nome OR player2 = :nome";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function nomePlayer1($jogo) {
        $sql = "SELECT * FROM jogos WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            return $sql['player1'];
        } else {
            return false;
        }
    }

    public function nomePlayer2($jogo) {
        $sql = "SELECT * FROM jogos WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            return $sql['player2'];
        } else {
            return false;
        }
    }

    public function isGameOver($jogo) {
        $sql = "SELECT * FROM jogos WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            if($sql['gameOver'] == 'true')
                return true;
            else 
                return false;
        } else {
            return false;
        }
    }

    public function gameOver($jogo) {
        $sql = "UPDATE jogos SET gameOver = 'true' WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        return true;
    }

    public function carregarJogo($jogo) {
        $sql = "SELECT * FROM jogadas WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function foiIniciado($jogo) {
        $sql = "SELECT * FROM jogadas WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}   