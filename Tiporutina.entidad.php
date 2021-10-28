<?php
 
 class Tiporutina
{
	private $_Id_Tiporutina;
	private $_Tiporutina;
	
	public function set_Id_Tiporutina($valor){ $this->_Id_Tiporutina = $valor;}
	public function set_Tiporutina($valor){ $this->_Tiporutina = $valor;}

	public function get_Id_Tiporutina() {return $this->_Id_Tiporutina;}
	public function get_Tiporutina(){return $this->_Tiporutina;}


}
?>