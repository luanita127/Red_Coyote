<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrolador: Luana Alvarez
    Propósito: Este código tiene el propósito de permitir publicar a los usuarios algún objeto perdido mediante el uso de un form, cuya información es enviada 
    por método fetch a su respectivo archivo js (publicarObjeto.js), que no solo enviará la información recibida al php de despliegue, si no también, ejecutará
    la parte dinámica de la página, como el mapa interactivo y los alerts. Se le da formato con el archivo publicarProducto.css ubicado en la carpeta Statics/styles*/ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../Statics/styles/publicarProducto.css">
    <link rel="stylesheet" href="../../Statics/styles/navs.css">
    <link rel="icon" href="../../Statics/media/logo.png" type="image/icon">
    <title>Publicar Objeto</title>
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

      <!-- Header -->
      <header><h1>Publicar Objeto</h1></header>

      <!--- Contenido --->
      <div id="nuevoProducto">
        <div class="row">
          <div class="col-7" id="centrar">
             <!--- Form --->
              <div class="producto" id="centrar">
                  <form id="form-producto">
                      <div class="d-grid gap-2 col-5 mx-auto" id="nombre"><input type="text" class="form-control" id="placeholder" placeholder="Nombre del Objeto" name="nombre" required></div>
                      <div class="d-grid gap-2 col-10 mx-auto" id="imagenes">
                          <img src="../../Statics/media/publicarProducto/img.jpg" class="img-fluid" id="default">
                          <div class="d-grid gap-2 col-12 mx-auto">
                              <input class="form-control" accept=".jpg" accept="image/*" type="file" name="arch" id="img" extrequired>
                          </div>
                      </div>
                      <div class="d-grid gap-2 col-10 mx-auto">
                          <label class="texto" id="Descripción">Descripción:</label>
                          <textarea class="form-control" id="Descripción" rows="3" name="descripcion" required maxlength="500"></textarea>
                      </div>
                      <div class="down">
                          <div class="d-grid gap-2 col-3 mx-auto">
                              <label class="texto">Fecha en la que se perdió/encontró:</label>
                              <input type="date" id="transparent" class="form-control" name="fecha" required>
                          </div>
                          <div class="d-grid gap-2 col-3 mx-auto">
                            <label class="texto">Recompensa:</label>
                            <textarea id="transparent" class="form-control" name="recompensa" required max="50" required></textarea>
                        </div>
                      </div>
              </div>
          </div>
          <div class="col-5" id="centrar">
            <!-- Puntos de venta y horarios -->
              <div class="horarios" id="centrar">
                <h3>Ultima vez visto</h3>
                <div class="d-grid gap-2 col-10 mx-auto">
                  <img src="../../Statics/media/puntosPrepa/mapa.jpg" class="img-fluid" id="mapa" usemap="#image-map">
                  <button id="btn-back">Regresar</button>
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
                          <label class="texto">Lugar</label>
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
                  </div>
                </form>
              </div>
            <!-- Datos de Contacto -->
              <div class="contacto" id="centrar">
                <h3>Datos de contacto</h3>
                <div class="texto">Recuerda que tus datos de contacto son los que registraste en <a href="./perfil.php">tu perfil</a>.</div>
                <div id="celular">
                  <div id="content">
                    <img src="../../Statics/media/publicarProducto/cel.png" class="img-fluid" id="cel">
                    <?php echo '<div id="text">'.$_SESSION["Celular"].'</div>'?>
                  </div>
                </div>
                <div id="instagram">
                  <div id="content2">
                    <img src="../../Statics/media/publicarProducto/ig.png" class="img-fluid" id="ig">
                    <?php echo '<div id="text">'.$_SESSION["Instagram"].'</div>'?>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="derecha" ><button type="submit" id="btn-publicar">Publicar</button></div>
      </div>
      </div>
      <br><br>

      <script src="../js/publicarObjeto.js"></script>
      <script src="../../libs/bootstrap-5.3.0-dist (1)/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
</body>
</html>