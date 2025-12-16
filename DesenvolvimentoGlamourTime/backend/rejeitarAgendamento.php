<?php
require_once "sistema.php";
$s = Sistema::getInstancia();

$id = $_GET["id"] ?? null;

if (!$id) {
    die("ID inválido.");
}

$res = $s->rejeitarAgendamento($id);

if ($res === "OK") {
    echo "<script>alert('Atendimento rejeitado e removido.'); window.location.href='../views/pages/admin/gerenciarAtendimentos.php';</script>";
} else {
    echo "<script>alert('$res'); history.back();</script>";
}
