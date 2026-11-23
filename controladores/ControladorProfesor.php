<?php

require_once __DIR__."/../modelos/ModeloProfesor.php";

class ControladorProfesor{
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new modeloProfesor();
    }
    
    function mostrarProfesores(){
        $this->vista="mostrarProfesor.php";
        return $this->modelo->mostrarProfesores();
    }

}