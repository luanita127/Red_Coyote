<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    
    echo"
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='../../Statics/styles/editar-servidor.css'>
            <link rel='stylesheet' href='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css'>
            <script src='../js/editar-servidor.js'></script>
            <title>Editar Servidor</title>
        </head>
        <body>
            <br>
            <header>
                <nav class='navbar navbar-expand-lg bg-body-tertiary'>
                    <div id='logos'>
                        <img id='P6' src='../../statics/media/EscudoP6.jpg' alt='Escudo de la P6'></img>
                        <img id='unam' src='../../statics/media/EscudoUNAM.jpg' alt='Escudo de la UNAM'></img>
                    </div>
                    <div class='container-fluid'>
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
                </nav>
            </header>
            <main>
                <h1 id='editarClub'>Editar Club</h1>
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
                <button id='editar'>Listo</button>
            </main>
            <script src='../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/js/bootstrap.bundle.js'></script>
        </body>
        </html>
    ";
?>