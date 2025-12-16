<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/pages/login.php");
    exit;
}

$lista = $sistema->listarAgendamentosCliente($usuario->id);

foreach ($lista as $a) {
    echo "
    <div class='agendamento-item'>
        <h3>{$a->servico}</h3>
        <p>{$a->data} às {$a->hora}</p>
        <p>Status: {$a->status}</p>

        <a href='../../backend/remarcar.php?id={$a->id}' class='btn-reschedule'>Remarcar</a>
        <a href='../../backend/cancelar.php?id={$a->id}' class='btn-cancel'>Cancelar</a>
    </div>
    ";
}
?>
