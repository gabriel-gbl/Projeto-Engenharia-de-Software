<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/pages/login.php");
    exit;
}

$servico = $_POST["servico"] ?? "";
$data = $_POST["data"] ?? "";
$hora = $_POST["hora"] ?? "";

if ($servico === "" || $data === "" || $hora === "") {
    echo "<script>
            alert('Preencha todos os campos!');
            window.location.href = '../views/pages/agendarHorario.php';
          </script>";
    exit;
}

$resultado = $sistema->agendar($usuario->id, $servico, $data, $hora);

if ($resultado === "OK") {
    echo "<script>
            alert('Agendamento realizado com sucesso!');
            window.location.href = '../views/pages/seuAgendamento.php';
          </script>";
    exit;
}

echo "<script>
        alert('$resultado');
        window.location.href = '../views/pages/agendarHorario.php';
      </script>";
?>
