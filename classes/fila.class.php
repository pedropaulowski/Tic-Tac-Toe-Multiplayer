<?php 

class Fila {
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=jogodavelha;host=localhost", "root", "");    
    }

    public function esperarJogador($player1) {
        $sql = "INSERT INTO fila SET player1 = :player1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":player1", $player1);
        $sql->execute();

    }

    public function cancelarFila($nick) {
        $sql = "UPDATE fila SET stats = 'CANCELADA', hora = NOW() WHERE player1 = :nick AND player2 IS NULL ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->execute();

    }

    public function filaFoiCancelada($nick, $hora) {
        $sql = "SELECT * FROM fila WHERE player1 = :nick AND player2 IS NULL AND hora >= :hora AND stats = 'CANCELADA'";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->bindValue(":hora", $hora);
        $sql->execute();

        if($sql->rowCount() > 0)
            return true;
        else 
            return false;
    }

    public function temJogadorEsperando() {
        $sql = "SELECT * FROM fila WHERE stats IS NULL AND player2 IS NULL LIMIT 1";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            return $sql['player1'];
        } else {
            return false;
        }
    }

    public function estaEsperando($nick) {
        $sql = "SELECT * FROM fila WHERE player1 = :nick AND player2 IS NULL AND stats IS NULL";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function completarFila($player1, $player2) {
        $sql = "UPDATE fila SET player2 = :player2 WHERE player1 = :player1";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":player2", $player2);
        $sql->bindValue(":player1", $player1);
        $sql->execute();

        return true;
    }



    public function msgParaAdversario($nick, $jogo) {
        $sql = "INSERT INTO mensagem SET nick = :nick, msg = :msg,hora = NOW()";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->bindValue(":msg", $jogo);
        $sql->execute();
    }

    public function arrayNovasMsgs($nick, $hora) {
        $sql = 'SELECT * FROM mensagem WHERE nick = :nick AND hora > :hora LIMIT 1';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->bindValue(":hora", $hora);
        $sql->execute();
        
        if($sql->rowCount() > 0) 
            return $sql->fetch(PDO::FETCH_ASSOC);
        else 
            return array();
    }
}