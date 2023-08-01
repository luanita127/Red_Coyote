<?php
    session_start();
    require "./config.php";
    require "./sanitizacion.php";

    $conexion = connect();
    $archPortada = (isset($_POST["archPortada"]) && $_POST["archPortada"] != "")? $_POST["archPortada"] : false;
    $archPFP = (isset($_POST["archPFPServer"]) && $_POST["archPFPServer"] != "")? $_POST["archPFPServer"] : false;
    $nombreClub = (isset($_POST["nombreClub"]) && $_POST["nombreClub"] != "")? $_POST["nombreClub"] : false;
    $proposito = (isset($_POST["proposito"]) && $_POST["proposito"] != "")? $_POST["proposito"] : false;
    $descripcion = (isset($_POST["descripcion"]) && $_POST["descripcion"] != "")? $_POST["descripcion"] : false;
    $reglas = (isset($_POST["reglas"]) && $_POST["reglas"] != "")? $_POST["reglas"] : false;
    $categoria = (isset($_POST["categoria"]) && $_POST["categoria"] != "")? $_POST["categoria"] : false;

    $nombreArchPortadaSanitizado = sanitizarCadenaSQL($_FILES["archPortada"]["name"]);
    $nombreArchPFPSanitizado = sanitizarCadenaSQL($_FILES["archPFPServer"]["name"]);
    $nombreClubSanitizado = sanitizarCadenaSQL($nombreClub);
    $propositoSanitizado = sanitizarCadenaSQL($proposito);
    $descripcionSanitizada = sanitizarCadenaSQL($descripcion);
    $reglasSanitizadas = sanitizarCadenaSQL($reglas);
    $categoriaSanitizada = sanitizarCadenaSQL($categoria);

    $nombreClubSanitizado = "\"".$nombreClubSanitizado."\"";
    $propositoSanitizado = "\"".$propositoSanitizado."\"";
    $descripcionSanitizada = "\"".$descripcionSanitizada."\"";
    $reglasSanitizadas = "\"".$reglasSanitizadas."\"";
    $categoriaSanitizada = "\"".$categoriaSanitizada."\"";

    if($_FILES["archPortada"])
    {
        $arch = $_FILES["archPortada"];
        $name = $arch["name"];
        $ruta_temp = $arch["tmp_name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        if(!file_exists('../../Statics/media/portada-club'))
        {
            mkdir('../../Statics/media/portada-club');
        }
        $nuevaRuta= "../../Statics/media/portada-club/$name";
        rename($ruta_temp,$nuevaRuta);
    }

    if($_FILES["archPFPServer"])
    {
        $arch = $_FILES["archPFPServer"];
        $name = $arch["name"];
        $ruta_temp = $arch["tmp_name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        if(!file_exists('../../Statics/media/pfp-club'))
        {
            mkdir('../../Statics/media/pfp-club');
        }
        $nuevaRuta= "../../Statics/media/pfp-club/$name";
        rename($ruta_temp,$nuevaRuta);
    }

    if($_FILES["archPortada"])
    {
        $arch = $_FILES["archPortada"];
        $name = $arch["name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        if(!file_exists('../../Statics/media/clubesIMG'))
            mkdir('../../Statics/media/clubesIMG');
        if(!file_exists('../../Statics/media/clubesIMG/portadas'))
            mkdir('../../Statics/media/clubesIMG/portadas');
        $nuevaRuta= "../../Statics/media/portada-club/$name";
        $imgPortada = "../../Statics/media/clubesIMG/portadas/$name";
        rename($nuevaRuta,$imgPortada);
        $imgPortada = "\"".$imgPortada."\"";
    }

    if($_FILES["archPFPServer"])
    {
        $arch = $_FILES["archPFPServer"];
        $name = $arch["name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        if(!file_exists('../../Statics/media/clubesIMG'))
            mkdir('../../Statics/media/clubesIMG');
        if(!file_exists('../../Statics/media/clubesIMG/pfps'))
            mkdir('../../Statics/media/clubesIMG/pfps');
        $nuevaRuta= "../../Statics/media/pfp-club/$name";
        $imgPFP = "../../Statics/media/clubesIMG/pfps/$name";
        rename($nuevaRuta,$imgPFP);
        $imgPFP = "\"".$imgPFP."\"";
    }

    $peticion = "UPDATE club SET Nombre=$nombreClubSanitizado, Descripcion=$descripcionSanitizada, Reglas=$reglasSanitizadas, Tipo=$categoriaSanitizada, Proposito=$propositoSanitizado, PFP=$imgPFP, Portada=$imgPortada WHERE ID_Club=6";
    $query = mysqli_query($conexion,$peticion);
    if($query==true)
    {
        echo json_encode("Inserción correcta");
    }
?>