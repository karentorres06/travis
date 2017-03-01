<?php

class Pedido
{
    private $id_pedido;
    private $id_usuario;
    private $pedido_reserva;
    private $fecha;
    private $estado;

   
     function __construct($id_pedido, $id_usuario, $pedido_reserva, $fecha, $estado) {
       $this->id_pedido = $id_pedido;
       $this->id_usuario = $id_usuario;
       $this->pedido_reserva = $pedido_reserva;
       $this->fecha = $fecha;
       $this->estado = $estado;     
     }
    
    
    function setId_pedido($id_pedido){
       $this->id_pedido = $id_pedido;
     } 
     function getId_pedido(){
       return $this->id_pedido;
     }
     function setId_usuario($id_usuario){
       $this->id_usuario = $id_usuario;
     } 
     function getId_usuario(){
       return $this->id_usuario;
     } 
     function setePedido_reserva($pedido_reserva){
       $this->pedido_reserva = $pedido_reserva;
     } 
     function getPedido_reserva(){
       return $this->pedido_reserva;
     } 

     function setEstado($estado){
       $this->estado = $estado;
     } 
     function getEstado(){
       return $this->estado;
     } 

     function setFecha($fecha){
       $this->fecha = $fecha;
     } 
     function getFecha(){
       return $this->fecha;
     }

}

?> 
