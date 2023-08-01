<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrolador: Luana Alvarez
    Propósito: Este código a través de la cookie enviada por el archivo ventas.js designa el id del objeto seleccionado, para así igualarlo en la petición a mysql
    y poder desplegar toda la información del mismo. A su vez imprime toda la información que recibe y se le da formato con el archivo productoNuevo.css Se le da 
    formato con el archivo publicarProducto.css ubicado en la carpeta Statics/styles*/ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../Statics/styles/productoNuevo.css">
    <link rel="stylesheet" href="../../Statics/styles/navs.css">
    <link rel="icon" href="../../Statics/media/logo.png" type="image/icon">
    <title>Producto</title>
    <script src="../js/navs.js"></script>
</head>
<body>
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img class="img" src="../../Statics/media/logo.png" alt="Red Coyote" id="prepa6">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <article class="pagRedireccion" id="pagPrincipal">Pagina principal</article>
            <article class="pagRedireccion" id="ventas">Ventas</article>
            <article class="pagRedireccion" id="objPerdidos">Objetos perdidos</article>
            <article class="pagRedireccion" id="comunidad">Comunidad P6</article>
        </ul>
        <?php echo ' 
                    <div>
                        <img src="'.$_SESSION["Foto_Perfil"].'" alt="FotoPerfil" class="fotito" class="img-fluid" id="fotitoPerfil">
                    </div>'; ?>
    </div>
</nav>
</body>
</html>
  <!-- CONTENIDO -->
<?php

    require "config.php";
    $conexion = connect();
    if(!$conexion)
        echo "No se pudo conectar con la base";
    else
    {
        // Datos del producto //
        $id = $_COOKIE["producto"];
        $sql="SELECT NombreProducto, Foto, Descripcion, Costo, FechaVenta, Horario, CelularUsuario, InstagramUsuario, ID_PuntosPrepa FROM producto NATURAL JOIN puntosprepa WHERE ID_PRODUCTO=$id;"; //ASIGNAR ID_PRODUCTO con la vista de productos
        $res = mysqli_query($conexion, $sql);
        $respuesta = mysqli_fetch_assoc($res);
        $nombre = $respuesta["NombreProducto"];
        $foto = $respuesta["Foto"];
        $producto = "$foto";
        $descripcion = $respuesta["Descripcion"];
        $costo = $respuesta["Costo"];
        $fecha = $respuesta["FechaVenta"];
        $horario = $respuesta["Horario"];
        $celular = $respuesta["CelularUsuario"];
        $ig = $respuesta["InstagramUsuario"];
        $id_lugar = $respuesta["ID_PuntosPrepa"];
        // Datos del lugar //
        $peticion="SELECT Nombre, Foto_Lugar FROM puntosprepa WHERE ID_PuntosPrepa = '$id_lugar';";
        $regresa = mysqli_query($conexion, $peticion);
        $answer = mysqli_fetch_assoc($regresa);
        $lugar = $answer["Nombre"];
        $imagen_lugar = $answer["Foto_Lugar"];
        $img = "$imagen_lugar";
    echo 
    '<main>
        <aside>
            <article id="mapayhorarios">
                <h3>Punto de venta y horario</h3>
                <div id="center-img"><img id="mapa" class="img-fluid" src=',"'$img'",'></div>
                <div id="up">
                    <div id="horario">Horario: </div>
                    <div class="despliegue"> &nbsp'; echo $horario; echo' </div>
                </div>
                <div class="leyenda">Este punto de venta y horario fueron designados por el vendedor, si no se adecuan a tu disponibilidad recuerda que puedes contactar al vendedor y acordar la entrega en un punto/horario distinto</div>
            </article>
            <article id="contacto">
                <h3>Contacta al vendedor</h3>
                <div id="celular">
                    <img src="../../Statics/media/publicarProducto/cel.png" class="img-fluid" id="cel">
                    <div class="texto">'.$celular.'</div> 
                </div>
                <div id="instagram">
                    <img src="../../Statics/media/publicarProducto/ig.png" class="img-fluid" id="ig">
                    <div class="texto">'.$ig.'</div>
                </div>
            </article>  
        </aside>  
        <section id="producto">
            <div id="nombre">'; echo $nombre; echo'</div>
            <div><img id="imagen" class="img-fluid" src=',"$producto",'></div>
            <div id="descripcion">
                <div class="text">Descripción:</div>
                <div class="despliegue" id="cuadro">'; echo $descripcion; echo'</div>
            </div>
            <div id="down">
                <div class="centrar">
                    <div class="text">Lugar de entrega</div>
                    <div class="despliegue" id="cuadritos">'; echo $lugar; echo'</div>
                </div>
                <div class="centrar">
                    <div class="text">Fecha de disponibilidad</div>
                    <div class="despliegue" id="cuadritos">'; echo $fecha; echo'</div>
                </div>
                <div class="centrar">
                    <div class="text">Costo</div>
                    <div class="despliegue" id="cuadritos">$'; echo $costo; echo'</div>
                </div>
            </div>

        </section>
  <main>';
}
?>