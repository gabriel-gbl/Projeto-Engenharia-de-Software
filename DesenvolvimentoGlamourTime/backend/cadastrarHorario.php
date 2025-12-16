<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario || $usuario->tipo !== "manicure") {
    echo "<script>alert('Acesso negado!'); window.location='../views/pages/login.php';</script>";
    exit;
}

$data = $_POST["data"] ?? null;
$hora = $_POST["hora"] ?? null;

if (!$data || !$hora) {
    echo "<script>alert('Preencha todos os campos!'); history.back();</script>";
    exit;
}

$res = $sistema->adicionarHorarioDisponivel($data, $hora);

if ($res === "OK") {
    echo "<script>alert('Horário cadastrado com sucesso!'); 
        window.location='../views/pages/admin/cadastrarHorário.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar horário.'); history.back();</script>";
}
