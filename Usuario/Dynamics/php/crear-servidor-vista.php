<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    echo
    "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='../../Statics/styles/crear-servidor.css'>
            <link rel='stylesheet' href='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css'>
            <link rel='icon' href='../../Statics/media/logo.png' type='image/icon'>
            <script src='../js/crear-servidor.js'></script>
            <link rel='stylesheet' href='../../Statics/styles/navs.css'>
            <script src='../js/navs.js'></script>
            <title>Crear Servidor</title>
        </head>
        <body>
            <header>
            <nav class='navbar navbar-expand-lg navbar-light bg-light'>
            <img class='img' src='../../Statics/media/logo.png' alt='Red Coyote' id='prepa6'>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                    <article class='pagRedireccion' id='pagPrincipal'>Pagina principal</article>
                    <article class='pagRedireccion' id='ventas'>Ventas</article>
                    <article class='pagRedireccion' id='objPerdidos'>Objetos perdidos</article>
                    <article class='pagRedireccion' id='comunidad'>Comunidad P6</article>
                </ul> 
                <div>
                    <img src='".$_SESSION["Foto_Perfil"]."' alt='FotoPerfil' class='fotito' class='img-fluid' id='fotitoPerfil'>
                </div>
                <article class='fotoUsuario' id='perfil'><!--Foto de usuario BD--></article>
            </div>
        </nav>
            </header>
            <main>
                <h1 id='crearClub'>Crear Club</h1>
                <img id='PortadaServer' src='../../Statics/media/portada-club/img.jpg'>
                <img id='pfpServer' src='../../Statics/media/pfp-club/img.jpg'>
                <form id='form-club'>
                    <label>Nombre del club:
                        <input type='text' placeholder='Club de' name='nombreClub'/>
                    </label><br><br>
                    <label>Proposito:
                        <input type='text' placeholder='Escribe el proposito del club' name='proposito'/>
                    </label><br><br>
                    <label>Descripción:
                        <input type='text' placeholder='¿Qué actividades se llevaran acabo? ¿Cómo funciona? ¿Por qué deberían unirse a este club? Etc...' name='descripcion'/>
                    </label><br><br>
                    <label>Reglas:
                        <input type='text' placeholder='Escribe las reglas que deben cumplir los usuarios para formar parte de tu club.' name='reglas'/>
                    </label><br><br>
                    <select id='Categoria' name='categoria'>Categoria:
                        <option value='Ayuda'>Ayuda</option>
                        <option value='Diversion'>Diversión</option>
                    </select><br><br>
                    Portada del server
                    <input id='Portada' type='file' accept='.jpg' accept='image/' value='Foto de portada' name='archPortada'/><br><br>
                    Foto de perfil del server
                    <input id='PFPServer' type='file' accept='.jpg' accept='image/*' value='Foto de portada' name='archPFPServer'/>
                </form>
                <button id='crear'>Crear</button>
            </main>
            <script src='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/js/bootstrap.bundle.js'></script>
        </body>
        </html>
    ";
?>