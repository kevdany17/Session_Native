<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Session{
	public function __construct(){
	}
	//Implementacion de Sobrecarga
	public function set_userdata(){
		$numeroArgumentos = func_num_args(); //contar argumentos
		switch ($numeroArgumentos) {
			case '1':
				session_start();
				//Asigna la session con el nombre de la clase, y serializa el objeto
				$_SESSION[get_class(func_get_arg(0))] = serialize(func_get_arg(0)); 
				break;
			case '2':
				session_start();
				//Asigna la session con un nombre especificado por el usuario, y serializa el objeto
				$_SESSION[func_get_arg(0)] = serialize(func_get_arg(1));
				break;
			
			default:
			//Despliga mensaje de Error en caso argumentos <=0 o argumentos>2
				show_error("Error minimo un argumento requerido");
				break;
		}
	}
	public function userdata($nombre){
		//Retorna objeto deserializado
		//Comprueba si esta definido, o hay una session activa
		if(isset($_SESSION[$nombre])){
			return unserialize($_SESSION[$nombre]);
		}else{
			session_start();
			return unserialize($_SESSION[$nombre]);
		}
	}
	public function sess_destroy(){
		session_start();
		//destruye la sesion
		session_destroy();
	}
	public function unset_userdata($nombre){
		session_start();
		//vacia variable de sesion 
		session_unset($_SESSION[$nombre]);
	}
	public function verify_session(){
		$numeroArgumentos = func_num_args(); //contar argumentos
		switch ($numeroArgumentos) {
			case '1': //si es un argumento - comprueba si el objeto existe en la session
				session_start();
				if(isset($_SESSION[func_get_arg(0)])){
					return true;
				}else{
					return false;
				} 
				//break;
			case '2': //si recibe 2 argumentos 
				//1.- Comprueba que la variable este definida
				//2.- Comprueba que pertenesca el tipo, del segundo argumento, especificar tipo en string
				session_start();
				if(isset($_SESSION[func_get_arg(0)]) && 
					get_class(unserialize($_SESSION[func_get_arg(0)])) == func_get_arg(1)){
					return true;
				}else{
					return false;
				} 
				//break;
			default:
				echo "Error: minimo un argumento requerido";
				break;
		}		
	}
}
?>
