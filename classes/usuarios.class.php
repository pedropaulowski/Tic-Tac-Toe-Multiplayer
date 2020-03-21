<?php
class Usuarios {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=jogodavelha;host=localhost", "root", "");
    }

    public function logIn($nick, $senha) {
        $sql = "SELECT * FROM usuarios WHERE nick = :nick AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        
        
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cadastrar($nick, $senha) {
        $sql = "INSERT INTO usuarios (nick, senha) VALUES (:nick, :senha)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nick", $nick);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        
        return true;
    }
}
?>