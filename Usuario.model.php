<?php 
require_once("conexion.php");

class UsuarioModel
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

    		$stm = $this->pdo->prepare("SELECT * FROM usuarios"); //directiva de traer toda la tabla cargo
    		$stm->execute(); //ejecuta la consulta
    		    		foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
    		{
    			$Usuario = New Usuario(); // se crea una isntancia de Cargo 

    			$Usuario->set_Nombre($r->Nombre);
    			$Usuario->set_Apellido($r->Apellido);
    			$Usuario->set_Usuario($r->Usuario);
    			$Usuario->set_Clave($r->Clave);
    			$Usuario->set_Id_Usuario($r->Id_Usuario);

    			$result[] = $Usuario; //guarda cada instancia de cargo en el arreglo result
    		}  
    		return $result; //devuelve un arreglo de objeto cargo
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


//---------------------------------------------------Listar por Cargo-----------------------------------------
public function ListarxCargo($idcargo)
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios where Id_Cargo=?"); //directiva de traer toda la tabla cargo
            $stm->execute(array($idcargo)); //ejecuta la consulta
                        foreach($stm->fetchAll (PDO::FETCH_OBJ) as $r) //recorre una lista de objetos cargo que lo guarda
            {
                $Usuario = New Usuario(); // se crea una isntancia de Cargo 

                $Usuario->set_Nombre($r->Nombre);
                $Usuario->set_Apellido($r->Apellido);
                $Usuario->set_Usuario($r->Usuario);
                $Usuario->set_Clave($r->Clave);
                $Usuario->set_Id_Usuario($r->Id_Usuario);
   

                $result[] = $Usuario; //guarda cada instancia de cargo en el arreglo result
            }  
            return $result; //devuelve un arreglo de objeto cargo
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
//---------------------------------------------------------------------------------------------------------------------


    //---------------------------Metodo Acceder --------------------------------------------------------------
  public function Acceder(Usuario $data) //
   {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE Usuario=? and Clave=?"); //prepara la consulta 
            $stm->execute(array($data->get_Usuario(),$data->get_Clave())); //ejecuta la consulta y pasa por parametro el Id
            if($stm->rowCount()>0){
                $r = $stm->fetch(PDO::FETCH_OBJ); //Guarda en r el objeto de l
                //cargar variables de session, donde se cargan las variables de sesion 
                session_start();
                $_SESSION['Id_Usuario']=$r->Id_Usuario;
                $_SESSION['Usuario']=$r->Usuario;
                $_SESSION['Clave']=$r->Clave;
                return true;
            } else{
                return false;
            }
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }                                                                                                                                                                                                                                                              
    }                                  
    //-------------------------Fin Metodo Acceder--------------------------------------------------------------- 
     public function Obtener($Id_Usuario) //Busca un objeto Usuario segun Id_Usuario
    {
    	try
    	{
    		$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE Id_Usuario = ?"); //prepara la consulta 
    		$stm->execute(array ($Id_Usuario)); //ejecuta la consulta y pasa por parametro el Id

    		$r = $stm->fetch(PDO::FETCH_OBJ); //Guarda en r el resultado de la consulta guardado en $stm

    		$Usuario = new Usuario (); //	Crea un objeto alm, una instancia de la calse Cargo

    		$Usuario->set_Nombre($r->Nombre); //guarda en la instancia Cargo, el id del objeto de la clase Cargo
    		$Usuario->set_Apellido($r->Apellido); //lo mismo para el resto de los datos
    		$Usuario->set_Usuario($r->Usuario);
    		$Usuario->set_Clave($r->Clave);
    		$Usuario->set_Id_Usuario($r->Id_Usuario);//reguntar si va

    		return $Usuario; //segun el Id_Cargo especificado, devulve un objeto de la clase Cargos 
    	}
    	catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	
	public function Eliminar($Id_Usuario)//elimina un objeto de la clasealumno segun un Id_Cargo //elimina un Objeto
    {
    	try
    	{
    		$stm = $this->pdo->prepare("DELETE FROM usuarios Where Id_Usuario= ?") ; //crea la consulta 
    		$stm->execute(array($Id_Usuario)); //ejecuta la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }


    public function Actualizar (Usuario $data) //actualiza un registro de la tabla con un dato de tipo clase
    {
    	try
    	{
   
    		$sql = "UPDATE usuarios SET
    				Nombre     		 = ?,
    				Apellido 		 = ?,
    				Usuario 		 = ?,
    				Clave            = ?
    				Where Id_Usuario= ?";//Crea la consulta

    		$this->pdo->prepare($sql)
    			->execute(
    			array(
    				$data->get_Nombre(),
    				$data->get_Apellido(),
    				$data->get_Usuario(),
    				$data->get_Clave(),
    				$data->get_Id_Usuario()
    			)

    			); //ejecuta  la consulta 
    	}catch (Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	

public function Registrar (Usuario $data)
    {
    	try
    	{
    		$sql = "INSERT INTO usuarios (Id_Cargo, Nombre, Apellido, Usuario, Clave) VALUES (?, ?, ?, ?, ?)"; 

    		$this->pdo->prepare($sql)
    			->execute(
    				array(
                        $data->get_Id_Cargo(),
                        //$data->get_Id_Usuario(),
                        $data->get_Nombre(),
    					$data->get_Apellido(),
                        $data->get_Usuario(),
    					$data->get_Clave()
    				)
    			); 
    	}catch (Exception $e)
    	{
    		die ($e->getMessage());
    	}
    }	 
}  
?>
