<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_usuarioR']);

    /*== Verificando usuario ==*/
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuarioR WHERE id_usuarioR='$id'");

    if($check_usuario->rowCount()<=0){
        $datos = $check_usuario->fetch(PDO::FETCH_ASSOC);
        var_dump($datos);
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El usuario no existe en el sistema
            </div>
            
        ';
    }else{
    	$datos=$check_usuario->fetch();
    }
    $check_usuario=null;

    /*== Almacenando datos del usuario ==*/
    /*$usuario=limpiar_cadena($_POST['usuario']);
    $nombre=limpiar_cadena($_POST['nombre']);*/
    $clave=limpiar_cadena($_POST['clave']);

    $asignadouno=limpiar_cadena($_POST['asignadouno']);
    $turnouno=limpiar_cadena($_POST['turnouno']);

    $asignadodos=limpiar_cadena($_POST['asignadodos']);
    $turnodos=limpiar_cadena($_POST['turnodos']);

    $cargo=limpiar_cadena($_POST['cargo']);
    $area=limpiar_cadena($_POST['area']);

    $clavesga=limpiar_cadena($_POST['clavesga']);
    $estado=limpiar_cadena($_POST['estado']);


    /*== Verificando campos obligatorios ==*/
    if( $clave=="" || $asignadouno=="" || $turnouno=="" || $cargo=="" || $area=="" || $estado==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando usuario ==
    $check_usuario=null;
    if($usuario!=$datos['usuario']){
	    $check_usuario=conexion();
	    $check_usuario=$check_usuario->query("SELECT usuario FROM usuarioR WHERE usuario='$usuario'");
	    if($check_usuario->rowCount()>0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                El USUARIO ingresado ya se encuentra registrado, por favor elija otro
	            </div>
	        ';
	        exit();
	    }
	    $check_usuario=null;
    }*/



    /*== Actualizar datos ==*/
    $actualizar_usuarioR=conexion();
    $actualizar_usuarioR=$actualizar_usuarioR->prepare("UPDATE usuarioR SET clave=:clave,asignado_uno=:asignado_uno,turno_uno=:turno_uno,asignado_dos=:asignado_dos,turno_dos=:turno_dos,cargo=:cargo,area=:area,clave_sga=:clave_sga,estado=:estado where id_usuarioR=:id_usuarioR");

    $marcadores=[

        ":clave"=>$clave,
        ":asignado_uno"=>$asignadouno,
        ":turno_uno"=>$turnouno,
        ":asignado_dos"=>$asignadodos,
        ":turno_dos"=>$turnodos,
        ":cargo"=>$cargo,
        ":area"=>$area,
        ":clave_sga"=>$clavesga,
        ":estado"=>$estado,
        ":id_usuarioR"=>$id
    ];


    if($actualizar_usuarioR->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="usuario_R_actualizar" data-save="true">
                <strong>¡USUARIO R REGISTRADO!</strong><br>
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
    $actualizar_usuarioR=null;