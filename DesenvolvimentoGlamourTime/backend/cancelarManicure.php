<?php
require_once "sistema.php";
$sistema = Sistema::getInstancia();

$id = $_GET["id"] ?? null;
if ($id) {
    $sistema->cancelarAgendamentoManicure($id);
    echo "<script>alert('Agendamento cancelado!'); window.location='../views/admin/gerenciarAtendimentos.php';</script>";
}
