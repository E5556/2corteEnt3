<?php
include 'php/conexion.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$consultaDisponibilidad = "SELECT COUNT(ID_RELOJ) as total FROM relojes WHERE ID_RELOJ = '$id' AND DISPONIBILIDAD > 0";
$resultadoDisponibilidad = mysqli_query($conectar, $consultaDisponibilidad);

if ($resultadoDisponibilidad) {
    $filaDisponibilidad = mysqli_fetch_assoc($resultadoDisponibilidad);
    $totalDisponibilidad = $filaDisponibilidad['total'];

    if ($totalDisponibilidad > 0) {
        $consultaDetalles = "SELECT `ID_RELOJ`, `NOMBRE`, `DESCRIPCION`, `PRECIO`, `DESCUENTO` FROM relojes WHERE `ID_RELOJ` = '$id' AND `DISPONIBILIDAD` > 0 LIMIT 1";
        $resultadoDetalles = mysqli_query($conectar, $consultaDetalles);

        if ($resultadoDetalles) {
            $row = mysqli_fetch_assoc($resultadoDetalles);
            $nombre = $row['NOMBRE'];
            $descripcion = $row['DESCRIPCION'];
            $precio = $row['PRECIO'];
            $descuento = $row['DESCUENTO'];
            $precio_descu = $precio - (($precio * $descuento) / 100);
            $dir_imagenes = 'img/' . $id . '/';
            $rutaImg = file_exists($dir_imagenes . 'principal.jfif') ? $dir_imagenes . 'principal.jfif' : 'img/Nodisponible.png';
        } else {
            echo 'Error: No se pudieron obtener los detalles del reloj.';
        }
    } else {
        echo 'Error: El reloj no está disponible.';
    }
} else {
    echo 'Error: No se pudo verificar la disponibilidad del reloj.';
}

mysqli_close($conectar);
?>




<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Tienda Online</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                    <a href="carrito.php" class="btn btn-primary">
                    Carrito <span id="num_cart" class="badge bg-secondary"></span>

                    </a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="IMAGEN" class="d-block w-100">
                                <img src="<?php echo $dir_imagenes; ?>principal.jpg" class="d-block w-100">

                            </div>
    
                            <div class="carousel-item">
                            <img src="IMAGEN" class="d-block w-100">

                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">

                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            
                        </button>

                    </div>


                    
                </div>
                <div class="col-md-6 order-md-2">
                <h2>Nombre :<?php echo $nombre; ?></h2>
      
                     

              
               <h2>$Precio con Descuento <?php echo $precio_descu; ?></h2>

                    
                <small class="text-success"> <?php echo $descuento; ?></h2>% descuento</small>         
                </h2>


                <h2>PRECIO TOTAL : $<?php echo $precio; ?></h2>


                <p class="lead">DESCRIPCION : <?php echo $descripcion; ?>
                </p>
                <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-primary" type="button">Comprar ahora</button>
                        <button class="btn btn-outline-primary" type="button" onclick="">Agregar al carrito</button>

                </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

       
  
</body>

</html>