<?php
require_once __DIR__ . '/../modelos/ModeloAsignatura.php';

class ControladorAsignatura {
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new ModeloAsignatura();
    }

    /**
     *  da a la vista de las asignaturas las asignaturas
     */
    public function mostrarTabla() {
        $this->vista="mostrarAsignaturas.php";
        return $this->modelo->devolverAsignaturas();
    }
}
?>