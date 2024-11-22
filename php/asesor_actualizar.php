<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_asesor']);

    /*== Verificando usuario ==*/
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM asesor WHERE id_asesor='$id'");

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

    /*$nombre=limpiar_cadena($_POST['nombre']);
    $apellido=limpiar_cadena($_POST['apellido']);
    $dni=limpiar_cadena($_POST['dni']);*/

    $num_celular=limpiar_cadena($_POST['num_celular']);
    $turno=limpiar_cadena($_POST['turno']);

    $sala=limpiar_cadena($_POST['sala']);
    $estado=limpiar_cadena($_POST['estado']);
    
    /*== Verificando campos obligatorios ==
    if($nombre=="" || $apellido=="" || $numero_cel=="" || $turno=="" || $sala==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }*/

    /*== Verificando asesor ==
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT id_asesor FROM asesor WHERE id_asesor='$id'");
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
    $actualizar_asesor=conexion();
    $actualizar_asesor=$actualizar_asesor->prepare("UPDATE asesor SET num_celular=:num_celular,turno=:turno,sala=:sala, estado=:estado where id_asesor=:id_asesor");

    $marcadores=[

        /*":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":dni"=>$dni,*/
        ":num_celular"=>$num_celular,
        ":turno"=>$turno,
        ":sala"=>$sala,
        ":estado"=>$estado,
        ":id_asesor"=>$id
    ];


    if($actualizar_asesor->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="usuario_asesor_actualizar" data-save="true">
                <strong>¡ASESOR ACTUALIZADO!</strong><br>
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
    $actualizar_asesor=null;