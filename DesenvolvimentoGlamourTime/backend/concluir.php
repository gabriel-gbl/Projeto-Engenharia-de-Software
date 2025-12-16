<?php
require_once "sistema.php";
$sistema = Sistema::getInstancia();

$id = $_GET["id"] ?? null;
if ($id) {
    $sistema->concluirAtendimento($id);
    echo "<script>alert('Atendimento concluído!'); window.location='../views/admin/gerenciarAtendimentos.php';</script>";
}
