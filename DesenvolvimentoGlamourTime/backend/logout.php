<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();
$sistema->logout();

echo "<script>
        window.location.href = '../views/pages/login.php';
      </script>";
?>
