<?php
$con = mysql_connect("localhost", "usuario", "password");
if (!$con){
	die("No se podido realizar la conexión a la base de datos, error: ".mysql_error());
}

$db_select = mysql_select_db("base_de_datos",$con);

?>