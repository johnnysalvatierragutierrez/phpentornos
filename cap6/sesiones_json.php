<?php
function comprobar_sesion(){
	session_start();
	$timeout_seconds = 1800;
	if(!isset($_SESSION['usuario'])){
		return false;
	}
	if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_seconds)){
		session_unset();
		session_destroy();
		return false;
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	return true;
}
