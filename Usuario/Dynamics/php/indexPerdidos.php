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
    <link rel="stylesheet" href="../../Statics/styles/indexPerdidos.css">
    <title>Objetos Perdidos</title>
        <!--Estos links contienen "codigo" que ayudan a aplicar el estilo, hacerlo responsivo y algunas animaciones de js, pero yo no use-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="../js/navs.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <img  class="escudop6" id="vacio"src="../../statics/media/EscudoP6.jpg" alt="dos" width="80" height="80" >
            <img  class="unamescudo" id="vacio"src="../../statics/media/EscudoUNAM.jpg" alt="dos" width="80" height="80" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="pagRedireccion"  class="nav-item"><a class="nav-link" href="#" id="pagPrincipal">Página principal</a></li>
                        <li class="pagRedireccion"  class="nav-item"><a class="nav-link" href="#!" id="ventas">Ventas</a></li>
                        <li class="pagRedireccion"  class="nav-item"><a class="nav-link" href="#!" id="objPerdidos">Objetos perdidos</a></li>
                        <li class="pagRedireccion"  class="nav-item"><a class="nav-link" href="#!" id="comunidad" >Comunidad P6</a></li>
                    </ul>
                </div>
            </div>
            <img  class="fotoUsuario" id="perfil" class="escudop6" id="vacio" src="../../Statics/media/logo.png" alt="UNAM" id="UNAM" width="80" height="80" >
    </nav>
<body>
        <h1>Objetos Perdidos</h1>
<main>
    <!--Hay que buscar cual es la clase del fondo gris y quitarla o agregarle class="container overflow-hidden text-center" pls por que el fondo no quiere jalar -->
    <div class="container overflow-hidden text-center">
    <section class="Izquierda">
        <h2>Publicaciones Recientes</h2>
        <div>
            <button class="Filtrar">Filtrar por</button>
        </div>
        <div>
            <input class="form-control" type="search" placeholder="Buscar" size="100%">
        </div>
        <!--en esta parte se deven desplegar los divs de los objetos-->
    </section>
    </div>
    <div class="container overflow-hidden text-center">
    <section class="Derecha">
        <div class="Objeto">
            <h2 class="AgregarObjeto">¿Perdiste Algo?</h2>
            <button class="Mas" class="btn btn-secondary"><a class="nav-link" href="#" id="perder">+</a></button>
        </div>
        <div class="Objeto" class="container overflow-hidden text-center" >
            <h2 >¿Encontraste Algo?</h2>
            <button class="Mas"  class="btn btn-secondary"><a class="nav-link" href="#" id="encontre">+</a></button>
        </div>
        <div class="lugares" id="centrar">
            <form>
                <h2>Última vez vistos</h2>
                <div class="d-grid gap-2 col-10 mx-auto">
                    <img src="../../Statics/img/biblio.jpg" class="img-fluid" id="mapa" usemap="#image-map">
                    <button  class="btn btn-secondary" id="btn-back">Regresar</button>
                    <map name="image-map">
                        <area target="" id="Entrada" alt="Entrada" title="Entrada" href="" coords="179,194,199,223" shape="rect">
                        <area target="" id="PatioSextos" alt="Patio de Sextos" title="Patio de Sextos" href="" coords="168,139,187,169" shape="rect">
                        <area target="" id="PatioCuartos" alt="Patio de Cuartos" title="Patio de Cuartos" href="" coords="136,92,157,121" shape="rect">
                        <area target="" id="PatioQuintos" alt="Patio de Quintos" title="Patio de Quintos" href="" coords="106,43,125,70" shape="rect">
                        <area target="" id="Pulpo" alt="Pulpo" title="Pulpo" href="" coords="71,1,90,26" shape="rect">
                        <area target="" id="Mesas" alt="Mesas" title="Mesas" href="" coords="179,6,200,35" shape="rect">
                        <area target="" id="Canchas" alt="Canchas" title="Canchas" href="" coords="267,25,285,55" shape="rect">
                        <area target="" id="Biblio" alt="Biblio" title="Biblio" href="" coords="302,104,282,76" shape="rect">
                        <area target="" id="Pimpos" alt="Pimpos" title="Pimpos" href="" coords="254,109,275,138" shape="rect">
                        <area target="" id="h" alt="h" title="Los h´s" href="" coords="294,128,314,156" shape="rect">
                        <area target="" id="Vestidores" alt="Vestidores" title="Vestidores" href="" coords="375,53,356,25" shape="rect">
                    </map>
                </div>
                <div class="mapayhorarios">
                    <div class="d-grid gap-2 col-5 mx-auto">
                        <label>Lugar</label>
                        <select name="lugar" class="form-select" id="lugar" required>
                            <option disabled selected></option>
                            <option value="Entrada">Entrada</option>
                            <option value="Patio de Sextos">Patio de Sextos</option>
                            <option value="Patio de Cuartos">Patio de Cuartos</option>
                            <option value="Patio de Quintos">Patio de Quintos</option>
                            <option value="Pulpo">Pulpo</option>
                            <option value="Mesas">Mesas</option>
                            <option value="Canchas">Canchas</option>
                            <option value="Pimponeras">Pimpos</option>
                            <option value="Los H">Los H</option>
                            <option value="Biblioteca">Biblio</option>
                            <option value="Vestidores">Vestidores</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto">
                        <label>Horario:</label>
                        <input type="time"  min="7:00" max="21:00" id="transparent" class="form-control" name="hora" required>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div>
</main>
</body>
</html>