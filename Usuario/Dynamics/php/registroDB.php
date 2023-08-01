<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        header('Location: ./inicio.php');
    }
    /*Desarrollador: Eduardo Garduño 
    Proposito: En esta pagina se obtienen los datos que manda el usuario en registro.php, para poder ser guardados en la base de datos, no sin
    antes pasar por ciertos filtros para que no puedan poner cosas sin sentido o incluso perjudicar nuestra base de datos, esto fue hecho mediante
    funciones de sanitizacion y como segundo filtro regex, si se nota algo raro en lo que manda el usuario la pagina le avisara en donde debe
    cambiar la informacion para poder registrarse y pueda disfrutar de nuestros servicios, esta pagina nos redirigira a iniciar sesion para comenzar
    con los datos registrados aqui*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="../../Statics/media/logo.png" type="image/icon">
</head>
<body>
    
</body>
</html>
<?php
    require "./config.php";
    require "./contraseña.php";
    require "./sanitizacion.php";
    $conexion = connect ();

    if(!$conexion){
        echo "No se pudo conectar con la base de datos";
    }else{
        // $arch = (isset($_POST["arch"]) && $_POST["arch"] != "")? $_POST["arch"] : false;
        $user = sanitizarNumSQL((isset($_POST["user"]) && $_POST["user"] != "")? $_POST["user"] : false);
        $contraseña = sanitizarEmailSQL((isset($_POST["contraseña"]) && $_POST["contraseña"] != "")? $_POST["contraseña"] : false);
        $nombre = sanitizarCadenaSQL((isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false);
        $celular = sanitizarNumSQL((isset($_POST["celular"]) && $_POST["celular"] != "")? $_POST["celular"] : false);
        $instagram = sanitizarEmailSQL((isset($_POST["instagram"]) && $_POST["instagram"] != "")? $_POST["instagram"] : false);
        $regex1 = "[;]";
        $regex2 = "[\s]";
        $regex3 = "/^@(\w|\.){1,}/";

        if(strlen($user) != 9)
            echo "Tu usuario debe llevar solo números";
        else if(strlen($contraseña) < 8 || preg_match($regex1, $contraseña) == 1 || preg_match($regex2, $contraseña) == 1) 
            echo "Tu contraseña no debe llevar espacios ni ;";
        else if(strlen($nombre) >= 20 || preg_match($regex1, $nombre) == 1)
            echo "Tu nombre es muy largo y/o no debe llevar ;";
        else if(strlen($celular) != 10)
            echo "Tu numero le faltan o sobran caracteres";
        else if(strlen($instagram) >= 20 || preg_match($regex1, $instagram) == 1 || preg_match($regex3, $instagram) == 0)
            echo "Tu instagram no es correcto";
        else{
            if($_FILES["arch"]["name"] != ""){
                $name = $_FILES["arch"]["name"];
                $arch = $_FILES["arch"]["tmp_name"];
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $nombreDeArchivo = pathinfo($name, PATHINFO_FILENAME);
                $nuevaRuta= "../../Statics/media/fotosPerfil/$nombreDeArchivo.$ext";
                rename($arch, $nuevaRuta);
            }
            $sal = generarSal();
            $pimienta = generarPimienta();
            $contraHash = hashearContra($contraseña.$pimienta.$sal);

            $existe = "SELECT * FROM usuario WHERE Cuenta = '$user'";
            $buscando = mysqli_query($conexion, $existe);
            if(mysqli_num_rows($buscando) > 0){     // si ya existe ese usuario no volver a crear
                echo "Ese usuario ya esta registrado";
            }else{      //se guarda en base de datos y redirige
                if($_FILES["arch"]["name"] != ""){
                    $sql = "INSERT INTO usuario (Cuenta, Nombre, Contraseña, Instagram, Celular, Sal, Foto_Perfil) VALUES ('$user', '$nombre', '$contraHash', '$instagram', '$celular', '$sal', '$nuevaRuta')";
                    $res = mysqli_query($conexion, $sql);
                }else{
                    $rutaDefecto = "../../Statics/media/fotosPerfil/perfilVacio.png";
                    $sql = "INSERT INTO usuario (Cuenta, Nombre, Contraseña, Instagram, Celular, Sal, Foto_Perfil) VALUES ('$user', '$nombre', '$contraHash', '$instagram', '$celular', '$sal', '$rutaDefecto')";
                    $res = mysqli_query($conexion, $sql);
                }
                // recibe foto de perfil si se hace...
                header('Location: ../../index.php');
            }
        }
    }
?>