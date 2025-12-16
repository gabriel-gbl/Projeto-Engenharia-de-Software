<?php
require_once "sistema.php";

$sistema = Sistema::getInstancia();

$lista = $sistema->listarHorariosDisponiveis();

foreach ($lista as $h) {
    echo "<button class='time-btn'>{$h['hora']}</button>";
}
?>
