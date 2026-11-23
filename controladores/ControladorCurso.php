<?php

require_once __DIR__."/../modelos/modeloCursos.php";

class ControladorCurso{
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new modeloCursos();
    }

    function mostrarCursos(){
        $this->vista="mostrarCurso.php";
        return $this->modelo->devolverCursos();
    }

    function pedirCursos(){
        $this->vista="elegirCurso.php";
        return $this->modelo->devolverCursosSinHorario();
    }

    function pedirCursosCon(){
        $this->vista="listaHorario.php";
        return $this->modelo->devolverCursosConHorario();
    }
}


?>