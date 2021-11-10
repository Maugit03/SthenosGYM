<?php 
require_once("conexion.php");

class EjerciciosModel
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

    		$stm = $this->pdo->prepare("SELECT * FROM ejercicios"); //directiva de traer toda la tabla cargo
    		$stm->execute(); //ejecuta la consulta
    		    		foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
    		{
    			$Ejercicios = New Ejercicios(); // se crea una isntancia de Cargo 

    			$Ejercicios->set_Nombre_Ejercicio($r->Nombre_Ejercicio);
    			$Ejercicios->set_Descripcion($r->Descripcion);
    			$Ejercicios->set_Id_Ejercicio($r->Id_Ejercicio);

    			$result[] = $Ejercicios; //guarda cada instancia de cargo en el arreglo result
    		}  
    		return $result; //devuelve un arreglo de objeto cargo
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


//---------------------------------------------------Listar por Cargo-----------------------------------------
public function ListarxTiporutina($Id_Tiporutina)
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ejercicios where Id_Tiporutina=?"); //directiva de traer toda la tabla cargo
            $stm->execute(array($Id_Tiporutina)); //ejecuta la consulta
                        foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
            {
                $Ejercicios = New Ejercicios(); // se crea una isntancia de Cargo 

                $Ejercicios->set_Nombre_Ejercicio($r->Nombre_Ejercicio);
                $Ejercicios->set_Descripcion($r->Descripcion);
                $Ejercicios->set_Id_Ejercicio($r->Id_Ejercicio);
   

                $result[] = $Ejercicios; //guarda cada instancia de cargo en el arreglo result
            }  
            return $result; //devuelve un arreglo de objeto cargo
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

	public function Eliminar($Id_Ejercicio)//elimina un objeto de la clasealumno segun un Id_Cargo //elimina un Objeto
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM ejercicios Where Id_Ejercicio= ?") ; //crea la consulta 
    		$stm->execute(array($Id_Ejercicio)); //ejecuta la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


    public function Actualizar (Ejercicios $data) //actualiza un registro de la tabla con un dato de tipo clase
    {
    	try
    	{
   
    		$sql = "UPDATE ejercicios SET
    				Nombre_Ejercicio    		 = ?,
    				Descripcion 		         = ?,
    				Where Id_Ejercicio= ?";//Crea la consulta

    		$this->pdo->prepare($sql)
    			->execute(
    			array(
    				$data->get_Nombre_Ejercicio(),
    				$data->get_Descripcion(),
    				$data->get_Id_Ejercicio()
    			)

    			); //ejecuta  la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	

public function Registrar (Ejercicios $data)
    {
    	try
    	{
    		$sql = "INSERT INTO ejercicios (Id_Tiporutina, Nombre_Ejercicio, Descripcion) VALUES (?, ?, ?)"; 

    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Id_Tiporutina(),
                        $data->get_Nombre_Ejercicio(),
    					$data->get_Descripcion()
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}  
?>