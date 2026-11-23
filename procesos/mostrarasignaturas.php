<?php

require __DIR__ . '/../controladores/ControladorAsignatura.php';
$controlador = new ControladorAsignaturas("mostrarAsignaturas.php");
$resultado=$controlador->mostrarTabla();
include __DIR__ . '/../vistas/' . $controlador->vista;

?>