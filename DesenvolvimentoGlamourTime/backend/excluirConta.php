<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/pages/login.php");
    exit;
}

$resultado = $sistema->excluirUsuario($usuario->id);

if ($resultado === "OK") {
    echo "<script>
            alert('Sua conta foi excluída permanentemente.');
            window.location.href = '../views/pages/login.php';
          </script>";
    exit;
}

foreach ($sistema->agendamentos as $a) {
    if ($a->idCliente == $usuario->id && $a->status != "cancelado") {
        $sistema->liberarHorario($a->data, $a->hora);
    }
}


echo "<script>
        alert('Erro ao excluir conta.');
        history.back();
      </script>";
exit;
