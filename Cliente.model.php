<?php 
require_once("conexion.php");

class ClienteModel
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

    		$stm = $this->pdo->prepare("SELECT * FROM cliente"); 
    		$stm->execute(); 
    		    		foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) 
    		{
    			$Cliente = New Cliente(); // se crea una isntancia de Cargo 

    			$Cliente->set_Nombre($r->nombre);
                $Cliente->set_Dni($r->dni);
    			$Cliente->set_Telefono($r->telefono);
				$Cliente->set_Direccion($r->direccion);
				$Cliente->set_Correo($r->correo);
    			$Cliente->set_Id_Cliente($r->id_cliente);

    			$result[] = $Cliente; //guarda cada instancia de cargo en el arreglo result
    		}  
    		return $result; //devuelve un arreglo de objeto cargo
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }                
	public function ListarxCliente($Id_Cliente)
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cliente where Id_Cliente=?"); //directiva de traer toda la tabla cargo
            $stm->execute(array($Id_Cliente)); //ejecuta la consulta
                        foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
            {
                $Cliente = New Cliente(); // se crea una isntancia de Cargo 

                $Cliente->set_Nombre($r->nombre);
                $Cliente->set_Dni($r->dni);
    			$Cliente->set_Telefono($r->telefono);
				$Cliente->set_Direccion($r->direccion);
				$Cliente->set_Correo($r->correo);
    			$Cliente->set_Clave($r->clave);
                $Cliente->set_Id_Cliente($r->id_cliente);
   

                $result[] = $Cliente; //guarda cada instancia de cargo en el arreglo result
            }  
            return $result; //devuelve un arreglo de objeto cargo
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }                                                                                                                                                                                                                   	                               
    //-------------------------Fin Metodo Acceder--------------------------------------------------------------- 
     public function Obtener($Id_Cliente) //Busca un objeto Usuario segun Id_Usuario
    {
    	try
    	{
    		$stm = $this->pdo->prepare("SELECT * FROM cliente WHERE Id_Cliente = ?"); //prepara la consulta 
    		$stm->execute(array ($Id_Cliente)); //ejecuta la consulta y pasa por parametro el Id

    		$r = $stm->fetch(PDO::FETCH_OBJ); //Guarda en r el resultado de la consulta guardado en $stm

    		$Cliente = new Cliente (); //	Crea un objeto alm, una instancia de la calse Cargo
			
			$Cliente->set_Nombre($r->Nombre);
    			$Cliente->set_Dni($r->Dni);
    			$Cliente->set_Telefono($r->Telefono);
				$Cliente->set_Direccion($r->Direccion);
				$Cliente->set_Correo($r->Correo);
    			$Cliente->set_Clave($r->Clave);
    			$Cliente->set_Id_Cliente($r->Id_Cliente);
			
    		$Cliente->set_Nombre($r->Nombre); //guarda en la instancia Cargo, el id del objeto de la clase Cargo
			$Cliente->set_Dni($r->Dni);
			$Cliente->set_Telefono($r->Telefono);
			$Cliente->set_Direccion($r->Direccion);
    		$Cliente->set_Correo($r->Correo); //lo mismo para el resto de los datos
    		$Cliente->set_Clave($r->Clave);
    		$Cliente->set_Id_Cliente($r->Id_Cliente);//reguntar si va

    		return $Cliente; //segun el Id_Cargo especificado, devulve un objeto de la clase Cargos 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	

    public function Actualizar (Cliente $data) //actualiza un registro de la tabla con un dato de tipo clase
    {
    	try
    	{
   
    		$sql = "UPDATE cliente SET
    				Nombre     		 = ?,
    				Dni      		 = ?,
    				Telefono 		 = ?,
					Direccion        = ?,
					Correo           = ?,
    				Clave            = ?
    				Where Id_Cliente= ?";//Crea la consulta

    		$this->pdo->prepare($sql)
    			->execute(
    			array(
    				$data->get_Nombre(),
    				$data->get_Dni(),
    				$data->get_Telefono(),
					$data->get_Direccion(),
					$data->get_Correo(),
    				$data->get_Clave(),
    				$data->get_Id_Cliente()
    			)

    			); //ejecuta  la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	
	public function Acceder(Cliente $data)
    {
        try {

            $stm=$this->pdo->prepare("select Nombre, Id_Cliente from cliente where Correo=? and Clave=?");
            $stm->execute(array($data->get_Correo(), $data->get_Clave()));
            $cantreg=$stm->rowcount();
            if($cantreg==0){
                return false;
            }
            else{
                $r= $stm->fetch(PDO::FETCH_OBJ);
                session_start();
				$_SESSION['Id_Cliente']=$r->Id_Cliente;
                $_SESSION['Nombre']=$r->Nombre;
				$_SESSION['Dni']=$r->Dni;
				$_SESSION['Telefono']=$r->Telefono;
				$_SESSION['Direccion']=$r->Direccion;
				$_SESSION['Correo']=$r->Correo;
				$_SESSION['Clave']=$r->Clave;
				return true;
            }
        }
        catch (Exception $e){
            $die ($e->getMessage());
        }
    }

public function Registrar (Cliente $data)
    {
    	try
    	{
    		$sql = "INSERT INTO cliente (Nombre, Dni, Telefono, Direccion, Correo, Clave) VALUES (?, ?, ?, ?, ?, ?)"; 

    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        //$data->get_Id_Cliente(),
                        $data->get_Nombre(),
    					$data->get_Dni(),
                        $data->get_Telefono(),
    					$data->get_Direccion(),
						$data->get_Correo(),
						$data->get_Clave(),
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}  
?>
