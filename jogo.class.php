<?php

class Game{
    private $jogada;
    private $jogo;
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=jogodavelha;host=localhost", "root", "");    
    }
    public function novaJogada() {

    
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
        $sql = "SELECT * FROM jogo WHERE jogo = :jogo";
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
        $sql = "SELECT * FROM jogo WHERE jogo = :jogo AND player1 = :nome OR player2 = :nome";
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
        $sql = "SELECT * FROM jogo WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql['player1'];
        } else {
            return false;
        }
    }

    public function nomePlayer2($jogo) {
        $sql = "SELECT * FROM jogo WHERE jogo = :jogo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":jogo", $jogo);
        $sql->execute();

        if($sql ->rowCount() > 0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql['player2'];
        } else {
            return false;
        }
    }

}