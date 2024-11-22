<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_usuarioD']);

    /*== Verificando usuario ==*/
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuarioD WHERE id_usuarioD='$id'");

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

    /*$usuario=limpiar_cadena($_POST['usuario']);
    $nombre=limpiar_cadena($_POST['nombre']);*/
    $clave=limpiar_cadena($_POST['clave']);

    $asignado=limpiar_cadena($_POST['asignado']);
    $turno=limpiar_cadena($_POST['turno']);

    $cargo=limpiar_cadena($_POST['cargo']);
    $estado=limpiar_cadena($_POST['estado']);

    
    /*== Verificando campos obligatorios ==*/
    if( $clave=="" || $asignado=="" || $turno=="" || $cargo=="" || $estado==""){
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
    $check_usuario=$check_usuario->query("SELECT usuario FROM usuarioD WHERE usuario='$usuario'");
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
    $actualizar_usuarioD=conexion();
    $actualizar_usuarioD=$actualizar_usuarioD->prepare("UPDATE usuarioD SET clave=:clave,asignado=:asignado,turno=:turno,cargo=:cargo,estado=:estado where id_usuarioD=:id_usuarioD");

    $marcadores=[

        ":clave"=>$clave,
        ":asignado"=>$asignado,
        ":turno"=>$turno,
        ":cargo"=>$cargo,
        ":estado"=>$estado,
        ":id_usuarioD"=>$id
    ];


    if($actualizar_usuarioD->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="usuario_D_actualizado" data-save="true">
                <strong>¡USUARIO D actualizado!</strong><br>
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
    $actualizar_usuarioD=null;