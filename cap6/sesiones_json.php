<?php
function comprobar_sesion(int $timeout = 900): bool { // 900s = 15
min
session_start();
// Si no hay usuario, no hay sesión válida
if (!isset($_SESSION['usuario'])) {
return false;
}
$ahora = time();
// Si existe marca de actividad y ha expirado -> cerrar sesión
if (isset($_SESSION['ultima_actividad']) && ($ahora -
$_SESSION['ultima_actividad']) > $timeout) {
return false;
}
// Actualiza actividad
$_SESSION['ultima_actividad'] = $ahora;
return true;
} 