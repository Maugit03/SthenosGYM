<?php
require_once("conexion.php");

class LoginModel
{

private $pdo;


    public function __construct()
    {
        $con = New conexion(); //Instancia de la clase conexion 
        $this-> pdo = $con->getConexion(); //guardo en pdo la conexion de la instanica conexion 
    }  
        public function Listar()
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ");

            $stm->execute();

            foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r)

            {
    			
    		}  
    		return $result; 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
}
?>