<!DOCTYPE php>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style3.css">
  <title>Formulario Registro tienda</title>
</head>
<body>
  <section class="form-register" >
  <form action="php/registros.php" method="post" class="formulario__login">
    <h4>Formulario Registro De Producto</h4>
    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre Producto" required>
    <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Ingrese Descripcion Producto" required>
    <input class="controls" type="text" name="precio" id="precio" placeholder="Ingrese Precio" required>
    <input class="controls" type="text" name="descuento" id="descuento" placeholder="Ingrese Descuento" required>
    <input class="controls" type="text" name="disponibilidad" id="disponibilidad" placeholder="Ingrese cantidad Disponible" required>

    <!--<p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>-->
    <input class="botons" type="submit" value="Registrar">
</form>

<form action="index2.php" method="post" >
                    <input class="botons" type="submit" value="Ver Productos disponibles">   <!-- <p><a href="#">¿Ya tengo Cuenta?</a></p>   -->
            </form>

  </section>

 

 
</body>
</html>