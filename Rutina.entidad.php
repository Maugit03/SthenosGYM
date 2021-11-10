<?php
   class Rutina
{
	private $_Id_Rutina;
	private $_Id_Cliente;
	private $_Id_Grupo_Muscular;
	private $_Id_Tiporutina;
	private $_Id_Ejercicio;
	private $_Series;
	private $_Repeticiones;
	private $_Descanso;
	private $_Peso;

	

	public function set_Id_Rutina($valor){ $this->_Id_Rutina = $valor;}
	public function set_Id_Cliente($valor){ $this->_Id_Cliente = $valor;}
	public function set_Id_Grupo_Muscular($valor){ $this->_Id_Grupo_Muscular = $valor;}
	public function set_Id_Tiporutina($valor){ $this->_Id_Tiporutina = $valor;}
	public function set_Id_Ejercicio($valor){ $this->_Id_Ejercicio = $valor;}
	public function set_Series($valor){ $this->_Series = $valor;}
	public function set_Repeticiones($valor){ $this->_Repeticiones = $valor;}
	public function set_Descanso($valor){ $this->_Descanso = $valor;}
	public function set_Peso($valor){ $this->_Peso = $valor;}

	public function get_Id_Rutina(){return $this->_Id_Rutina;}
	public function get_Id_Cliente(){return $this->_Id_Cliente;}
	public function get_Id_Grupo_Muscular(){return $this->_Id_Grupo_Muscular;}
	public function get_Id_Tiporutina(){return $this->_Id_Tiporutina;}
	public function get_Id_Ejercicio(){return $this->_Id_Ejercicio;}
	public function get_Series(){return $this->_Series;}
	public function get_Repeticiones(){return $this->_Repeticiones;}
	public function get_Descanso(){return $this->_Descanso;}
	public function get_Peso(){return $this->_Peso;}
}
?>