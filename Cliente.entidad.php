<?php
   class Cliente
{
	private $_Nombre;
	private $_Apellido;
	private $_Cliente;
	private $_Clave;
	private $_Id_Cliente;
	

	public function set_Nombre($valor){ $this->_Nombre = $valor;}
	public function set_Apellido($valor){ $this->_Apellido = $valor;}
	public function set_Cliente($valor){ $this->_Cliente = $valor;}
	public function set_Clave($valor){ $this->_Clave = $valor;}
	public function set_Id_Cliente($valor){ $this->_Id_Cliente = $valor;}

	public function get_Nombre(){return $this->_Nombre;}
	public function get_Apellido(){return $this->_Apellido;}
	public function get_Cliente(){return $this->_Cliente;}
	public function get_Clave(){return $this->_Clave;}
	public function get_Id_Cliente(){return $this->_Id_Cliente;}
}
?>