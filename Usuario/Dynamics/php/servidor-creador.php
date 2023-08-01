<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor-Creador</title>
    <link rel="icon" href="../../Statics/media/logo.png" type="image/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <img  class="escudop6" id="vacio"src="../../statics/media/EscudoP6.jpg" alt="dos" width="80" height="80" >
            <img  class="unamescudo" id="vacio"src="../../statics/media/EscudoUNAM.jpg" alt="dos" width="80" height="80" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <!-- La primera clase hace el dieseñp( color, letra,etc) la segunda y tercera es parte de la resposividad-->
                        <li  class="pagRedireccion" class="nav-item"><a class="nav-link" id="pagPrincipal" href="#">Página principal</a></li>
                        <li  class="pagRedireccion"class="nav-item"><a class="nav-link" id="ventas" href="#!">Ventas</a></li>
                        <li  class="pagRedireccion"class="nav-item"><a class="nav-link"  id="objPerdidos" href="#!">Objetos perdidos</a></li>
                        <li  class="fotoUsuario" class="nav-item"><a class="nav-link"  id="perfil" href="#!">Comunidad P6</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</head>
<body>
    
</body>
</html>
<?php
    require "./config.php";
    $conexion = connect (); //Conexión con la base de datos
    // regresa el número del último registro hecho //
    $sql = "SELECT MAX(ID_Club) FROM Club";
    $res = mysqli_query($conexion, $sql);
    $num = mysqli_fetch_row($res);
    $club = $num[0];
    // regresa la información del club creado con la ayuda de la petición anterior //
    $peticion = "SELECT * FROM club WHERE ID_Club=$club"; //petición
    $query = mysqli_query($conexion, $peticion);
    $info_club = mysqli_fetch_assoc($query); //Información que regreso la petición
    $info_club["PFP"] = "\"".$info_club['PFP']."\"";
    $info_club["Portada"] = "\"".$info_club['Portada']."\"";
    echo
    "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css'>
            <link rel='stylesheet' href='../../Statics/styles/servidor-creador.css'>
            <script src='../js/servidor-creador.js'></script>
            <title>Document</title>
        </head>
        <body>
            <br>
            <header>
                <!--<nav class='navbar navbar-expand-lg bg-body-tertiary'>
                    <div id='logos'>
                        <img id='P6' src='../../statics/media/EscudoP6.jpg' alt='Escudo de la P6'></img>
                        <img id='unam' src='../../statics/media/EscudoUNAM.jpg' alt='Escudo de la UNAM'></img>
                    </div>
                    <div class='container-fluid' class='Elementos Barra' >
                        <div class='navbar-brand'></div>
                        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                        </button>
                        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <br><br>
                        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                            <li class='nav-item'>
                                <button id='pfp' class='nav'></button>
                            </li>
                            <br>
                            <li class='nav-item'>
                                <button id='paginaPrincipal' class='nav'>Página Principal</button>
                            </li>
                            <br>
                            <li class='nav-item'>
                                <button id='Ventas' class='nav'>Ventas</button>
                            </li>
                            <br>
                            <li class='nav-item'>
                                <button id='ObjetosPerdidos' class='nav'>Objetos Perdidos</button>
                            </li>
                            <br>
                            <li>
                                <button id='ComunidadP6' class='nav'>Comunidad 
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>-->
            </header>
            <main>
                <img id='PortadaServer' src=".$info_club["Portada"]." alt='Portada del servidor'></img>
                <img id='pfpServer' src=".$info_club["PFP"]." alt='Foto de perfil del servidor'></img>
                <button id='editar'>Editar</button>
                <div id='linkServer'>...</div>
                <section id='infoServer'>
                    <article id='nombreServer' class='infoServer'>Nombre del servidor: ".$info_club["Nombre"]."</article>
                    <article id='categoria' class='infoServer'>Categoria: ".$info_club["Tipo"]."</article>
                </section>
                <br>
                <br>
                <section id='descripcion_reglas'>
                    <article id='descipcion'><br>Descripción: <br>".$info_club["Descripcion"]."</article>
                    <article id='reglas'><br>Reglas: <br>".$info_club["Reglas"]."</article>
                </section>
                <br>
                <section id='chatServer'>Chat del servidor
                    <div id='agregarMSJ'>+</div>
                </section>
            </main>
            <script src='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/js/bootstrap.bundle.js'></script>
        </body>
        </html>
    ";
?>