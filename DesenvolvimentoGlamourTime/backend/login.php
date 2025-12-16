<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

if ($email === "" || $senha === "") {
    echo "<script>
            alert('Preencha todos os campos!');
            window.location.href = '../views/pages/login.php';
          </script>";
    exit;
}

$tipo = $sistema->fazerLogin($email, $senha);

if ($tipo === "cliente") {
    header("Location: ../views/pages/home.php");
    exit;
}

if ($tipo === "manicure") {
    header("Location: ../views/pages/admin/home.php");
    exit;
}

echo "<script>
        alert('Email ou senha incorretos!');
        window.location.href = '../views/pages/login.php';
      </script>";
?>
