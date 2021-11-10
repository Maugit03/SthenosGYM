<?php
   class Ejercicios
{
	private $_Nombre_Ejercicio;
	private $_Descripcion;
	private $_Id_Ejercicio;
	private $_Id_Tiporutina;
	

	public function set_Nombre_Ejercicio($valor){ $this->_Nombre_Ejercicio = $valor;}
	public function set_Descripcion($valor){ $this->_Descripcion = $valor;}
	public function set_Id_Ejercicio($valor){ $this->_Id_Ejercicio = $valor;}
	public function set_Id_Tiporutina($valor){ $this->_Id_Tiporutina = $valor;}

	public function get_Nombre_Ejercicio(){return $this->_Nombre_Ejercicio;}
	public function get_Descripcion(){return $this->_Descripcion;}
	public function get_Id_Ejercicio(){return $this->_Id_Ejercicio;}
	public function get_Id_Tiporutina(){return $this->_Id_Tiporutina;}
}
?>