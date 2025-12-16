<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();

$nome  = $_POST["nome"]  ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

if ($nome === "" || $email === "" || $senha === "") {
    echo "<script>
            alert('Preencha todos os campos!');
            window.location.href = '../index.php';
          </script>";
    exit;
}

$resultado = $sistema->cadastrarUsuario($nome, $email, $senha);

if ($resultado === "OK") {
    echo "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href = '../views/pages/login.php';
          </script>";
    exit;
}

echo "<script>
        alert('$resultado');
        window.location.href = '../index.php';
      </script>";
?>
