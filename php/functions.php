<?php
include ("../login/security.php");
require_once("../db/conexion.php");

addUser();

function addUser() {
	
	parse_str($_POST['action'],$formData);

	var_dump($formData);
	exit();
	
	/*
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $datatime = date("Y-m-d H:i:s");

	//Arreglo de categorias
	$array_categorys = $formData['categorys'];
	$image = "null";

	$sql_products = "INSERT INTO Productos 
						VALUES (null,'".$formData['name_product']."',
							'".$formData['description']."','".$formData['stocks']."',
							'".$formData['pricelist']."','".$formData['pricefailbox']."',
							'".$formData['model']."','".$formData['sku']."',
							'".$formData['status']."','".$image."',
							'".$formData['url_paypal']."','".$formData['outstanding']."',
							'".$datatime."')";
	$res = mysql_query($sql_products,Conectar::con()) or die(mysql_error());

	//Obtenemos el ultimo id añadido en la tabla Productos
	$id_producto = mysql_insert_id();

	//Insertamos los datos con relacion a la tabla Productos_has_Categorias
	for ($i=0; $i < count($array_categorys); $i++) { 
		$sql_category = "INSERT INTO Productos_has_Categorias VALUES ('".$id_producto."', '".$array_categorys[$i]."')";
			$res = mysql_query($sql_category,Conectar::con()) or die(mysql_error());
	}
				
	//Insertamos los datos con relacion a la tabla Productos_has_Marcas
	$sql_brand = "INSERT INTO Productos_has_Marcas VALUES ('".$id_producto."', '".$formData['brand']."')";
	$res = mysql_query($sql_brand,Conectar::con()) or die(mysql_error());

	echo $id_producto;*/
	
}