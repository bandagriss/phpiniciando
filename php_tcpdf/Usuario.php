<?php

class Usuario {
    private $nombre;
    private $paterno;
    private $materno;
    private $telefono;
    
    function __construct($nom ="Ivan", $pat="Aroa", $mat="Miranda", $tel="134545"){
        $this->nombre = $nom;
        $this->paterno = $pat;
        $this->materno = $mat;
        $this->telefono = $tel;
    }

    
    function get_nombre(){
        return $this->nombre;
    }
    
    function set_nombre($nom){
        $this->nombre = $nom;
    }
    function get_paterno(){
        return $this->paterno;
    }
    
    function set_paterno($pat){
        $this->paterno = $pat;
    }
    function get_materno(){
        return $this->materno;
    }
    
    function set_materno($mat){
        $this->materno = $mat;
    }
    function get_telefono(){
        return $this->telefono;
    }
    
    function set_telefono($tel){
        $this->telefono = $tel;
    }
    
    function cambiarNombre($nuevo){
        $this->nombre = $nuevo;
    }
}






?>