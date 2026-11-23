<?php

require "config.php";
$controladorNombre = $_GET['controlador'] ?? controladorBase;
$metodoNombre = $_GET['metodo'] ?? metodoBase;
require controladores.$controladorNombre.".php";
$controlador = new $controladorNombre();
$datos=$controlador->$metodoNombre();
include vistas.$controlador->vista;

?>