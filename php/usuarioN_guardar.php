<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    $usuario=limpiar_cadena($_POST['usuario']);
    $nombre=limpiar_cadena($_POST['nombre']);
    $clave=limpiar_cadena($_POST['clave']);

    $asignado=limpiar_cadena($_POST['asignado']);
    $num_autenticacion=limpiar_cadena($_POST['num_autenticacion']);

    $cargo=limpiar_cadena($_POST['cargo']);
    $supervisor_cargo=limpiar_cadena($_POST['supervisor_cargo']);

    $clavesga=limpiar_cadena($_POST['clavesga']);
    $estado=limpiar_cadena($_POST['estado']);


    /*== Verificando campos obligatorios ==*/
    if($usuario=="" || $nombre=="" || $clave=="" || $asignado=="" || $num_autenticacion=="" || $cargo=="" || $supervisor_cargo=="" || $clavesga=="" || $estado==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }



    /*== Verificando usuario ==*/
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
    $check_usuario=null;


    /*== Guardando datos ==*/
    $guardar_usuarioN=conexion();
    $guardar_usuarioN=$guardar_usuarioN->prepare("INSERT INTO usuarioN(usuario,nombre,clave,asignado,num_autenticacion,cargo,supervisor_cargo,clave_sga,estado) VALUES(:usuario,:nombre,:clave,:asignado,:num_autenticacion,:cargo,:supervisor_cargo,:clave_sga,:estado)");

    $marcadores=[

        ":usuario"=>$usuario,
        ":nombre"=>$nombre,
        ":clave"=>$clave,
        ":asignado"=>$asignado,
        ":num_autenticacion"=>$num_autenticacion,
        ":cargo"=>$cargo,
        ":supervisor_cargo"=>$supervisor_cargo,
        ":clave_sga"=>$clavesga,
        ":estado"=>$estado
    ];

    $guardar_usuarioN->execute($marcadores);

    if($guardar_usuarioN->rowCount()==1){
        echo '
            <div class="notification is-info is-light" id="usuario_N" data-save="true">
                <strong>¡USUARIO N REGISTRADO!</strong><br>
                El usuario se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el usuario, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_usuarioN=null;