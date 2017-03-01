<?php

class plato
{

	private $descripcion;
	private $precio;
	private $estado;
	private $tipo_plato;
	private $id_plato;


	
	 
	function __construct($id_plato, $descripcion, $precio, $estado) {
	
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->estado = $estado;
		
		$this->id_plato = $id_plato;
		
		
	}
	function setid_plato($id_plato){
		$this->id_plato = $id_plato;
	}
	function getid_plato(){
		return $this->id_plato;
	}
	
	function setdescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	function getdescripcion(){
		return $this->descripcion;
	}

	function setestado($estado){
		$this->estado = $estado;
	}
	function getestado(){
		return $this->estado;
	}

	function setprecio($precio){
		$this->precio = $precio;
	}
	function getprecio(){
		return $this->precio;
	}
	
	function settipo_plato($tipo_plato){
		$this->precio = $tipo_plato;
	}
	function gettipo_plato(){
		return $this->tipo_plato;
	}

	
}

?>