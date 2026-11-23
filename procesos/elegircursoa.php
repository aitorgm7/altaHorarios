<?php

require __DIR__ . '/../controladores/ControladorCurso.php';
$controlador = new ControladorCurso("elegirCursoA.php");
$resultado=$controlador->pedirCursos();
include __DIR__ . '/../vistas/' . $controlador->vista;

?>