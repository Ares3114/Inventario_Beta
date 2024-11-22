<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_usuarioN']);

    /*== Verificando usuario ==*/
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuarioN WHERE id_usuarioN='$id'");

    if($check_usuario->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El usuario no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_usuario->fetch();
    }
    $check_usuario=null;

    /*== Almacenando datos del usuario ==*/

    /*$usuarion=limpiar_cadena($_POST['usuario']);
    $nombren=limpiar_cadena($_POST['nombre']);*/
    $clave=limpiar_cadena($_POST['clave']);

    $asignado=limpiar_cadena($_POST['asignado']);
    $num_autenticacion=limpiar_cadena($_POST['num_autenticacion']);

    $cargo=limpiar_cadena($_POST['cargo']);
    $supervisor_cargo=limpiar_cadena($_POST['supervisor_cargo']);

    $clave_sga=limpiar_cadena($_POST['clave_sga']);
    $estado=limpiar_cadena($_POST['estado']);

    
    /*== Verificando campos obligatorios ==*/
    if( $clave=="" || $asignado=="" || $num_autenticacion=="" || $cargo=="" || $supervisor_cargo=="" || $clave_sga=="" || $estado=="" ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando usuario ==
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT usuario FROM usuarioN WHERE usuario='$usuario'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_usuario=null;*/



    /*== Actualizar datos ==*/
    $actualizar_usuarioN=conexion();
    $actualizar_usuarioN=$actualizar_usuarioN->prepare("UPDATE usuarioN SET clave=:clave,asignado=:asignado,num_autenticacion=:num_autenticacion,
    cargo=:cargo,supervisor_cargo=:supervisor_cargo,clave_sga=:clave_sga, estado=:estado where id_usuarioN=:id_usuarioN");

    $marcadores=[

        ":clave"=>$clave,
        ":asignado"=>$asignado,
        ":num_autenticacion"=>$num_autenticacion,
        ":cargo"=>$cargo,
        ":supervisor_cargo"=>$supervisor_cargo,
        ":clave_sga"=>$clave_sga,
        ":estado"=>$estado,
        ":id_usuarioN"=>$id
    ];


    if($actualizar_usuarioN->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="usuario_N_actualizar" data-save="true">
                <strong>¡USUARIO N ACTUALIZADO!</strong><br>
                El usuario se registro con exito
            </div>
        ';
        
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el usuario, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_usuarioN=null;

    