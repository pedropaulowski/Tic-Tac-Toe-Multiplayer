<?php

session_start();
require 'classes/fila.class.php';
$f = new Fila();

if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])){
    $f->cancelarFila($_SESSION['nick']);
    $_SESSION['cancelar'] = "CANCELADA";
} else {
    exit;
}