<?php
require_once("conexion.php");

class TiporutinaModel
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

            $stm = $this->pdo->prepare("SELECT c1.Id_Tiporutina, c1.Tiporutina, c2.Tiporutina FROM tiporutinas AS c1 LEFT JOIN (SELECT * FROM tiporutinas) AS c2 ON c2.Id_Tiporutina");

            $stm->execute();

            foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r)

            {
    			$Tiporutina = New Tiporutina(); 

    			$Tiporutina->set_Id_Tiporutina($r->Id_Tiporutina);
    			$Tiporutina->set_Tiporutina($r->Tiporutina);
    			$result[] = $Tiporutina; 
    		}  
    		return $result; 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function Eliminar($Id_Tiporutina)
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM tiporutinas Where Id_Tiporutina = ?") ; //crea la consulta 
    		$stm->execute(array($Id_Tiporutina)); //ejecuta la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function Registrar (Tiporutina $data)
    {
    	try
    	{
    		$sql = "INSERT INTO tiporutinas (Tiporutina) VALUES (?)"; 
      
    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Tiporutina(),
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}
?>