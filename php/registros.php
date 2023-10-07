<?php


include_once 'conexion.php';//llamada de un archivo externo




// El formulario de inicio de sesión no se envió, continuar con el registro de usuarios


$Nombre = $_REQUEST['nombre'];//llamada a variables
$Descripciones = $_REQUEST['descripcion'];
$Precios = $_REQUEST['precio'];
$Descuentos = $_REQUEST['descuento'];
$Disponibilidades = $_REQUEST['disponibilidad'];


$insertar = "INSERT INTO `relojes`(`NOMBRE`, `DESCRIPCION`, `PRECIO`, `DESCUENTO`, `DISPONIBILIDAD`)
 VALUES ('$Nombre','$Descripciones','$Precios','$Descuentos','$Disponibilidades')";


$resultado = mysqli_query($conectar, $insertar);

if (!$resultado) {
	echo '<script>alert("Error al Registrar") </script>';
		header("Location:../index3.php");
}else{
	echo '<script>alert("Registro Exitoso") </script>';
	header("Location:../index3.php");

}

mysqli_close($conectar);

?>


