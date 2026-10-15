
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("../config.php");
require("../data.php");




if (isset($_POST["invitado"])) {

    header("Location: ../index.php");
    exit();
}






if($_SERVER["REQUEST_METHOD"]==="POST"){


$user = $_POST["usuario"];
$contraseña= $_POST["contraseña"];


$usuarioCorrecto=false;
$contraseñaCorrecta=false;

foreach($arr as $e) {

    if($e["usuario"]===$user){
    $usuarioCorrecto=true;
    if($e["passwd"]===$contraseña){
        $contraseñaCorrecta=true;
        $role = $e["role"];

    }
}
}
if($usuarioCorrecto){

    if($contraseñaCorrecta){

       $_SESSION["usuario_logged"] = $user;
        $_SESSION["role"]=$role;
        header("Location: ../dashboard.php");
        exit();

    }else{
        header("Location:../login.php?error=contraseña-incorrecta");
        exit();
        }
}else{
        header("Location: ../login.php?error=usuario-incorrrecto");
        exit();
        }
}



?> 