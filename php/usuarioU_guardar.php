<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    $usuario=limpiar_cadena($_POST['usuario']);
    $nombre=limpiar_cadena($_POST['nombre']);
    $clave=limpiar_cadena($_POST['clave']);

    $asignadouno=limpiar_cadena($_POST['asignado']);
    $turnouno=limpiar_cadena($_POST['turno']);

    $cargo=limpiar_cadena($_POST['cargo']);
    $estado=limpiar_cadena($_POST['estado']);


    /*== Verificando campos obligatorios ==*/
    if($usuario=="" || $nombre=="" || $clave=="" || $asignadouno=="" || $turnouno=="" || $cargo=="" || $estado==""){
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
    $check_usuario=$check_usuario->query("SELECT usuario FROM usuarioU WHERE usuario='$usuario'");
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
    $guardar_usuarioU=conexion();
    $guardar_usuarioU=$guardar_usuarioU->prepare("INSERT INTO usuarioU(usuario,nombre,clave,asignado,turno,cargo,estado) VALUES(:usuario,:nombre,:clave,:asignado,:turno,:cargo,:estado)");

    $marcadores=[

        ":usuario"=>$usuario,
        ":nombre"=>$nombre,
        ":clave"=>$clave,
        ":asignado"=>$asignadouno,
        ":turno"=>$turnouno,
        ":cargo"=>$cargo,
        ":estado"=>$estado
    ];

    $guardar_usuarioU->execute($marcadores);

    if($guardar_usuarioU->rowCount()==1){
        echo '
            <div class="notification is-info is-light" id="usuario_U" data-save="true">
                <strong>¡USUARIO U REGISTRADO!</strong><br>
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
    $guardar_usuarioU=null;