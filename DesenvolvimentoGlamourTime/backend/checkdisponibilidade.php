<?php
require_once "sistema.php";
$s = Sistema::getInstancia();

$data = $_POST['data'] ?? '';
$hora = $_POST['hora'] ?? '';

if (!$data || !$hora) {
    echo "Dados insuficientes";
    exit;
}

foreach ($s->agendamentos as $a) {
    if ($a->data == $data && $a->hora == $hora && $a->status !== "cancelado") {
        echo "Horário indisponível!";
        exit;
    }
}

echo "Horário disponível!";
exit;
