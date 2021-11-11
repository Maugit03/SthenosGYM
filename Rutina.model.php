<?php 
require_once("conexion.php");

class RutinaModel
{

private $pdo;

   public function __construct()
   {
   	$con = New conexion(); 
   	$this-> pdo = $con->getConexion(); 
    }  
        public function Listar()
    {
    	try 
    	{
    		$result = array();

    		$stm = $this->pdo->prepare("SELECT * FROM rutina"); 
    		$stm->execute(); 
    		    		foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) 
    		{
    			$Rutina = New Rutina(); 

    			$Rutina->set_Id_Cliente($r->Id_cliente);
    			$Rutina->set_Id_Grupo_Muscular($r->Id_grupo_muscular);
    			$Rutina->set_Id_Tiporutina($r->Id_tiporutina);
    			$Rutina->set_Id_Ejercicio($r->Id_Ejercicio);
				$Rutina->set_Series($r->Series);
				$Rutina->set_Repeticiones($r->Repeticiones);
				$Rutina->set_Descanso($r->Descanso);
				$Rutina->set_Peso($r->Peso);
                $Rutina->set_Id_Rutina($r->Id_rutina);

    			$result[] = $Rutina; 
    		}  
    		return $result; 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


//---------------------------------------------------Listar por Cliente-----------------------------------------
public function ListarxCliente($Id_Cliente)
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT C.Id_Cliente AS cliente, G.Grupo_Muscular AS grupomuscular, T.Tiporutina AS tiporutinas, E.Nombre_Ejercicio AS ejercicios, R.Series, R.Repeticiones, R.Descanso, R.Peso FROM rutina AS R INNER JOIN grupomuscular AS G ON G.Id_Grupo_Muscular = R.Id_grupo_muscular INNER JOIN tiporutinas AS T ON T.Id_Tiporutina = R.Id_Tiporutina INNER JOIN ejercicios AS E ON E.Id_Ejercicio = R.Id_Ejercicio INNER JOIN cliente AS C ON C.Id_Cliente = R.Id_Cliente WHERE C.Id_Cliente=?");
            $stm->execute(array($Id_Cliente)); 
                        foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) 

            {
                $Rutina = New Rutina(); 
    			$Rutina->set_Id_Grupo_Muscular($r->grupomuscular);
    			$Rutina->set_Id_Tiporutina($r->tiporutinas);
    			$Rutina->set_Id_Ejercicio($r->ejercicios);
				$Rutina->set_Series($r->Series);
				$Rutina->set_Repeticiones($r->Repeticiones);
				$Rutina->set_Descanso($r->Descanso);
				$Rutina->set_Peso($r->Peso);
				

                $result[] = $Rutina; 
            }  
            return $result; 
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
//---------------------------------------------------------------------------------------------------------------------
	public function Obtener($Id_Rutina) 
	{
	try
	{
		$stm = $this->pdo->prepare("SELECT * FROM rutina WHERE Id_Rutina = ?");  
		$stm->execute(array ($Id_Rutina)); 

		$r = $stm->fetch(PDO::FETCH_OBJ); 

		$Rutina = new Rutina (); 

		$Rutina->set_Id_Grupo_Muscular($r->Id_grupo_muscular);
    	$Rutina->set_Id_Tiporutina($r->Id_tiporutina);
    	$Rutina->set_Id_Ejercicio($r->Id_ejercicio);
		$Rutina->set_Series($r->Series);
		$Rutina->set_Repeticiones($r->Repeticiones);
		$Rutina->set_Descanso($r->Descanso);
		$Rutina->set_Peso($r->Peso);
		$Rutina->set_Id_Rutina($r->Id_rutina);

		return $Rutina; 
	}
	catch (Exception $e)
	{
		die($e->getMessage());
	}
}	

	public function Eliminar($Id_Rutina)
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM rutina Where Id_Rutina= ?") ; 
    		$stm->execute(array($Id_Rutina));  
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


    public function Actualizar (Rutina $data)
    {
    	try
    	{
   
    		$sql = "UPDATE rutina SET
    				Id_Cliente     		     = ?,
    				Id_Grupo_Muscular 		 = ?,
    				Id_Tiporutina     		 = ?,
    				Id_Ejercicio             = ?,
					Series					 = ?,
					Repeticiones             = ?,
					Descanso                 = ?,
					Peso                     = ?
    				Where Id_Rutina= ?";

    		$this->pdo->prepare($sql)
    			->execute(
    			array(
    				$data->get_Id_Cliente(),
    				$data->get_Id_Grupo_Muscular(),
    				$data->get_Id_Tiporutina(),
    				$data->get_Id_Ejercicio(),
					$data->get_Series(),
					$data->get_Repeticiones(),
					$data->get_Descanso(),
					$data->get_Peso(),
    				$data->get_Id_Rutina()
    			)

    			); //ejecuta  la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	

public function Registrar (Rutina $data)
    {
    	try
    	{
    		$sql = "INSERT INTO rutina (Id_Cliente, Id_Grupo_Muscular, Id_Tiporutina, Id_Ejercicio, Series, Repeticiones, Descanso, Peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 

    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Id_Cliente(),
                        $data->get_Id_Grupo_Muscular(),
    				    $data->get_Id_Tiporutina(),
    				    $data->get_Id_Ejercicio(),
						$data->get_Series(),
						$data->get_Repeticiones(),
						$data->get_Descanso(),
						$data->get_Peso()
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}  
?>