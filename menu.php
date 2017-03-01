<?php

class menu
{
	private $id;
	private $nombre;
	private $estado;
	private $tipo_menu;


	
	 
	function __construct($id, $nombre, $estado) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->estado = $estado;
		
	}

	function setId($orden){
		$this->orden = $id;
	}
	function getId(){
		return $this->id;
	}
	function setnombre($nombre){
		$this->nombre = $nombre;
	}
	function getnombre(){
		return $this->nombre;
	}

	function setestado($estado){
		$this->estado = $estado;
	}
	function getestado(){
		return $this->estado;
	}

	function settipo_menu($tipo_menu){
		$this->tipo_menu = $tipo_menu;
	}
	function gettipo_menu(){
		return $this->tipo_menu;
	}

	
}

?>