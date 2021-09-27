<?php 
require_once("conexion.php");

class CargoModel
{

	//atributo
private $pdo;

	//metodos 

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

    		$stm = $this->pdo->prepare("SELECT c1.Id_Cargo, c1.Cargo, c2.Cargo AS Superior FROM cargos AS c1 LEFT JOIN (SELECT * FROM cargos) AS c2 ON c2.Id_Cargo=c1.Id_Superior"); //directiva de traer toda la tabla cargo
			
    		$stm->execute(); //ejecuta la consulta 

    		foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
    		{
    			$Cargo = New Cargo(); // se crea una isntancia de Cargo 

    			$Cargo->set_Id_Cargo($r->Id_Cargo);//preguntar si va set_
    			$Cargo->set_Cargo($r->Cargo);
                if($r->Superior==NULL)
    			{
    				$Cargo->set_Superior("NINGUNO");
    			}else{
    				$Cargo->set_Superior($r->Superior);
    			}
    			$result[] = $Cargo; //guarda cada instancia de cargo en el arreglo result
    		}  
    		return $result; //devuelve un arreglo de objeto cargo
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    	
    
    public function Eliminar($Id_Cargo)//elimina un objeto de la clasealumno segun un Id_Cargo //elimina un Objeto
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM cargos Where Id_Cargo = ?") ; //crea la consulta 
    		$stm->execute(array($Id_Cargo)); //ejecuta la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function Registrar (Cargo $data)
    {
    	try
    	{
    		$sql = "INSERT INTO cargos (Cargo, Id_Superior) VALUES (?, ?)"; 
      
    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Cargo(),
    					$data->get_Id_Superior()
    					
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}  
?>