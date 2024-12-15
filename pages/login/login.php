<?php 
$user = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : '';
$pass = isset($_POST["password"]) ? trim($_POST["password"]) : '';
//Credenciales del Administrador
$ckuser = "admin";
$ckpass = "1234";
//Verifico para dar o no acceso
if (($user == $ckuser) && ($pass == $ckpass)){
    header("Location: /tienda_mcDonalds_peregol/pages/abm/consultas.html");
    exit();
} else {
    header("Location: /tienda_mcDonalds_peregol/pages/login/error.html");
    exit();
}
?>