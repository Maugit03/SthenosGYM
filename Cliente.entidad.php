<?php
   class Cliente
{
	private $_Nombre;
	private $_Dni;
	private $_Telefono;
	private $_Direccion;
	private $_Correo;
	private $_Clave;
	private $_Id_Cliente;
	

	public function set_Nombre($valor){ $this->_Nombre = $valor;}
	public function set_Dni($valor){ $this->_Dni = $valor;}
	public function set_Telefono($valor){ $this->_Telefono = $valor;}
	public function set_Direccion($valor){ $this->_Direccion = $valor;}
	public function set_Correo($valor){ $this->_Correo = $valor;}
	public function set_Clave($valor){ $this->_Clave = $valor;}
	public function set_Id_Cliente($valor){ $this->_Id_Cliente = $valor;}

	public function get_Nombre(){return $this->_Nombre;}
	public function get_Dni(){return $this->_Dni;}
	public function get_Telefono(){return $this->_Telefono;}
	public function get_Direccion(){return $this->_Direccion;}
	public function get_Correo(){return $this->_Correo;}
	public function get_Clave(){return $this->_Clave;}
	public function get_Id_Cliente(){return $this->_Id_Cliente;}
}
?>