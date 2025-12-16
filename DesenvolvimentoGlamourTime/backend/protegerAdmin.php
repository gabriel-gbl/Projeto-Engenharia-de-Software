<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario || $usuario->tipo !== "manicure") {
    echo "<script>alert('Acesso restrito!'); window.location='../views/pages/login.php';</script>";
    exit;
}
