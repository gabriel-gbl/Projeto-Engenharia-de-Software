<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/pages/login.php");
    exit;
}

$idAgendamento = $_GET["id"] ?? null;

if (!$idAgendamento) {
    echo "<script>alert('Agendamento inválido.'); history.back();</script>";
    exit;
}

$sistema->cancelarAgendamento($idAgendamento);

echo "<script>
        alert('Agendamento cancelado com sucesso!');
        window.location.href = '../views/pages/seuAgendamento.php';
      </script>";
?>
