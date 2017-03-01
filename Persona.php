<?php

class Persona
{
    private $idPersona;
    private $idUsuario;
    private $cedula;
    private $nombre;
    private $apellidos;
    private $edad;
    private $telefono;
    private $email;
    private $direccion;
    private $usuario;    //VARIABLE DE TIPO USUARIO

   
     function __construct($idPersona, $idUsuario, $cedula, $nombre, $apellidos, $edad, $telefono, $email, $direccion) {
       $this->idPersona = $idPersona;           
       $this->idUsuario = $idUsuario;     
       $this->cedula = $cedula;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->edad = $edad;
       $this->telefono = $telefono;
       $this->email = $email;
       $this->direccion = $direccion;
     }
    
     function setIDPersona($idPersona){
       $this->idPersona = $idPersona;
     } 
     function getIDPersona(){
       return $this->idPersona;
     } 
    
     function setIdUsuario($idUsuario){
       $this->idUsuario = $idUsuario;
     } 
     function getIdUsuario(){
       return $this->idUsuario;
     } 
    
     function setCedula($cedula){
       $this->cedula = $cedula;
     } 
     function getCedula(){
       return $this->cedula;
     } 
     function setNombre($nombre){
       $this->nombre = $nombre;
     } 
     function getNombre(){
       return $this->nombre;
     } 

     function setApellidos($apellidos){
       $this->apellidos= $apellidos;
     } 
     function getApellidos(){
       return $this->apellidos;
     }
    
     function setEdad($edad){
       $this->edad = $edad;
     } 
     function getEdad(){
       return $this->edad;
     } 

     function setTelefono($telefono){
       $this->telefono = $telefono;
     } 
     function getTelefono(){
       return $this->telefono;
     }

     function setEmail($email){
       $this->email = $email;
     } 
     function getEmail(){
       return $this->email;
     }
    function setDireccion($direccion){
       $this->direccion = $direccion;
     } 
     function getDireccion(){
       return $this->direccion;
     }
    function setUsuario($usuario){
       $this->usuario = $usuario;
     } 
     function getUsuario(){
       return $this->usuario;
     }
}

?> 
