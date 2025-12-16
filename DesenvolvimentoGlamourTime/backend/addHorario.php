<?php
require_once "sistema.php";
require_once "protegerAdmin.php";

$sistema = Sistema::getInstancia();

$data = $_POST['data'] ?? null;
$hora = $_POST['hora'] ?? null;

if (!$data || !$hora) {
    echo "<script>alert('Preencha data e hora!'); history.back();</script>";
    exit;
}

foreach ($sistema->listarHorariosDisponiveis() as $h) {
    if ($h->data === $data && $h->hora === $hora) {
        echo "<script>alert('Já existe um horário cadastrado para esse dia e hora!'); history.back();</script>";
        exit;
    }
}

$sistema->adicionarHorario($data, $hora);

echo "<script>
    alert('Disponibilidade adicionada com sucesso!');
    window.location.href = '../views/admin/consultarHorario.php';
</script>";
exit;
