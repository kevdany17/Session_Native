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
				//Asigna la session con el nombre de la clase
				$_SESSION[get_class($data)] = serialize($data); 
				break;
			case '1':
				session_start();
				//Asigna la session con un nombre especificado por el usuario, y serializa el objeto
				$_SESSION[$nombre] = serialize($data);
				break;
			
			default:
				echo "Error en minimo un argumento requerido";
				break;
		}
		

	}
	public function userdata($nombre){
		session_start();
		//Retorna objeto deserializado
		return unserialize($_SESSION[$nombre]);
	}
	public function sess_destroy(){
		session_start();
		//destruye variable de sesion
		session_destroy();
	}
	public function unset_userdata($nombre){
		session_start();
		//vacia variable de sesion 
		session_unset($_SESSION[$nombre]);
	}
	public function verify_session($nombre){
		session_start();
		//comprueba si una session existe
		if(isset($_SESSION[$nombre])){
			return true;
		}else{
			return false;
		}
	}
}
?>
