<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$usuario = $sistema->obterUsuarioLogado();

if (!$usuario) {
    header("Location: ../views/pages/login.php");
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');

if ($nome === '' || $email === '') {
    echo "<script>alert('Nome e email são obrigatórios'); history.back();</script>";
    exit;
}

foreach ($sistema->usuarios as $idx => $u) {
    if ($u->id == $usuario->id) {
        $sistema->usuarios[$idx]->nome = $nome;
        $sistema->usuarios[$idx]->email = $email;
        $sistema->usuarios[$idx]->telefone = $telefone;
        break;
    }
}

$_SESSION['usuarios'] = $sistema->usuarios;

if ($usuario->tipo === "manicure") {
    header("Location: ../views/pages/admin/perfilAdmin.php?atualizado=1");
    exit;
} else {
    header("Location: ../views/pages/perfil.php?atualizado=1");
    exit;
}
