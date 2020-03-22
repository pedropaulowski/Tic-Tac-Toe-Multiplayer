<?php
session_start();

require "classes/jogo.class.php";
require "classes/usuarios.class.php";

$g = new Game();
$u = new Usuarios();

if(isset($_SESSION['nick']) && !empty($_SESSION['nick']))
    header("Location: index.php");

if(isset($_POST['nick']) && isset($_POST['senha'])) {
    $senha = $_POST['senha'];
    $nick = $_POST['nick'];
    $u->cadastrar($nick, $senha);
    if($u->logIn($nick, $senha) == true) {
        $_SESSION['nick'] = $nick;
        header("Location: index.php");
    } else {
        echo "<h3>Tente novamente</h3>";
    }
}
?>
<head>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Nick ou Nome</label>
            <input type="text" class="form-control" name="nick">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Senha</label>
            <input type="password" class="form-control" name="senha">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value="CADASTRE - SE">
        </div>
    </form>
    <p>Precisamos que você tenha uma sessão para conseguirmos diferenciar as chamadas de fila</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>