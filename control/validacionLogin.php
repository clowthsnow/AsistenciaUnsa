<?php

SESSION_START();
include '../conexion.php';

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    //reciviendo datos del formulario
    $user = $_POST['usuario'];
    $contra = $_POST['contra'];
    $contra= md5($contra);
    
    if (!isset($user) || !isset($contra)) {
        header("location:../index.php");
    }

    //Consulta para buscar
    $consulta = "SELECT * FROM usuario WHERE UsuarioId='$user' AND UsuarioContra='$contra'";

    //Ejecutando consulta
    $resultado = $conexion->query($consulta) or die($conexion->error);

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if ($usuario['UsuarioEstReg'] === "A") {
            $_SESSION['usuario'] = $usuario['UsuarioId'];
            $nombres = $usuario['UsuarioNombre'] . ' ' . $usuario['UsuarioApellido'];
            $_SESSION['usuarioNombres'] = $nombres;
            $_SESSION['permisos'] = $usuario['UsuarioTipo'];
            
            header("location:../index.php");
//            echo(MD5($contra));
        }else{
            header("location:../page-login-error.php");
        }
    } else {
        header("location:../page-login-error.php");
    }
} else {
    //si hay sesion activa
    header("location:../index.php");
}
	
