<?php
require_once("conexion.php");

class GrupomuscularModel
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

            $stm = $this->pdo->prepare("SELECT * FROM grupomuscular");

            $stm->execute();

            foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r)

            {
    			$Grupomuscular = New Grupomuscular(); 

    			$Grupomuscular->set_Id_Grupo_Muscular($r->Id_Grupo_Muscular);
    			$Grupomuscular->set_Grupo_Muscular($r->Grupo_Muscular);
    			$result[] = $Grupomuscular; 
    		}  
    		return $result; 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function Eliminar($Id_Grupo_Muscular)
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM grupomuscular Where Id_Grupo_Muscular = ?") ; //crea la consulta 
    		$stm->execute(array($Id_Grupo_Muscular)); //ejecuta la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function Registrar (Grupomuscular $data)
    {
    	try
    	{
    		$sql = "INSERT INTO grupomuscular (Grupo_Muscular) VALUES (?)"; 
      
    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Grupo_Muscular(),
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}
?>