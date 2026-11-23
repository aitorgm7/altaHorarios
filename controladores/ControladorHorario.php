<?php

require_once __DIR__.'/../modelos/ModeloHorario.php';
require_once __DIR__.'/../modelos/ModeloAsignatura.php';
require_once __DIR__.'/../modelos/ModeloProfesor.php';

class ControladorHorario{

     public $vista;
     private $modeloAsignatura;
     private $modeloProfesor;
     private $modeloHorario;

    function __construct() {
        $this->modeloAsignatura = new ModeloAsignatura();
        $this->modeloProfesor = new ModeloProfesor();
        $this->modeloHorario = new ModeloHorario();
    }

    function verHorario(){
        $this->vista="mostrarHorario.php";
        return $this->modeloHorario->darHorario();
    }

    /**
     * devuelve los profesores y asignaturas de un curso
     */
    function devolverDatosAltaHorario(){
        $datos=[];
        $datos[0] = $this->cogerAsignaturasCurso();
        $datos[1] = $this->cogerProfesoresCurso();
        $this->vista="altaHorarios.php";
        return $datos;
    }

    function cogerAsignaturasCurso(){
        return $this->modeloAsignatura->cogerAsignaturasCurso();
    }

    function cogerProfesoresCurso(){
        return $this->modeloProfesor->cogerProfesoresCurso();
    }

    function guardarHorario(){
        $this->vista="horarioGuardado.php";
        return $this->modeloHorario->guardarhorario();
    }

}

?>