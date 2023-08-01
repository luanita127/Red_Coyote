<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrolador: Luana Alvarez
    Propósito: Este código a sirve como maquetado inicial para desplegar absolutamente todos los productos a traves del archivo ventas.js y ventasDB.php; se le da formato
    con el archivo ventas.css ubicado en la carpeta Statics/styles*/ 
?>
<html>
    <head>
        <!--Estos links contienen "codigo" que ayudan a aplicar el estilo, hacerlo responsivo y algunas animaciones de js, pero yo no use-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../../Statics/styles/ventas.css">
        <link rel="stylesheet" href="../../Statics/styles/navs.css">
        <link rel="icon" href="../../Statics/media/logo.png" type="image/icon">
        <script src="../js/navs.js"></script>
        <title>Ventas</title>
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

    <header class="mb-4">
        <!-- Barrita de busqueda-->
        <!-- <input class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="button-search" />
        <button class="btn btn-primary" id="button-search" type="button">Ir!</button> -->
        <h1>Ventas</h1>
    </header>
    <main>
            <div class="row">
                <div class="col-lg-9" id="productos">
                    <!-- Post content-->
                    <article>
                        <!-- Productos-->
                        <div class="container overflow-hidden text-center">
                            <h3>Productos destacados</h3>
                            <div class="row gy-5" id="producto"></div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-5" id="aside">
                    <h3 id="texto">Publicar producto</h3>
                    <div id="boton"><button id="nuevo">+</button></div>
            </div>
    </main>
        <script src="../js/ventas.js"></script>;
</body>
</html>
