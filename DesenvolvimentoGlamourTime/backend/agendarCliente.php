<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/login.php");
    exit;
}

$servico = $_POST["servico"] ?? null;
$horarioCompacto = $_POST["horarioEscolhido"] ?? null;

if (!$servico || !$horarioCompacto) {
    echo "<script>alert('Preencha todos os campos.');history.back();</script>";
    exit;
}

list($data, $hora) = explode("|", $horarioCompacto);

$resultado = $sistema->agendar($usuario->id, $servico, $data, $hora);

if ($resultado === "OK") {
    echo "<script>
        alert('Horário agendado com sucesso!');
        window.location.href = '../views/pages/seuAgendamento.php';
    </script>";
    exit;
} else {
    echo "<script>
        alert('$resultado');
        history.back();
    </script>";
    exit;
}
