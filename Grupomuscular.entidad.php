<?php
 
 class Grupomuscular
{
	private $_Id_Grupo_Muscular;
	private $_Grupo_Muscular;
	
	public function set_Id_Grupo_Muscular($valor){ $this->_Id_Grupo_Muscular = $valor;}
	public function set_Grupo_Muscular($valor){ $this->_Grupo_Muscular = $valor;}

	public function get_Id_Grupo_Muscular() {return $this->_Id_Grupo_Muscular;}
	public function get_Grupo_Muscular(){return $this->_Grupo_Muscular;}


}
?>