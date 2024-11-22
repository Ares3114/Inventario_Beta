<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    $usuario=limpiar_cadena($_POST['usuario']);
    $nombre=limpiar_cadena($_POST['nombre']);
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
    if($usuario=="" || $nombre=="" || $clave=="" || $asignadouno=="" || $turnouno=="" || $cargo=="" || $area==""  || $estado==""){
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


    /*== Guardando datos ==*/
    $guardar_usuarioR=conexion();
    $guardar_usuarioR=$guardar_usuarioR->prepare("INSERT INTO usuarioR(usuario,nombre,clave,asignado_uno,turno_uno,asignado_dos,turno_dos,cargo,area,clave_sga,estado) VALUES(:usuario,:nombre,:clave,:asignado_uno,:turno_uno,:asignado_dos,:turno_dos,:cargo,:area,:clave_sga,:estado)");

    $marcadores=[

        ":usuario"=>$usuario,
        ":nombre"=>$nombre,
        ":clave"=>$clave,
        ":asignado_uno"=>$asignadouno,
        ":turno_uno"=>$turnouno,
        ":asignado_dos"=>$asignadodos,
        ":turno_dos"=>$turnodos,
        ":cargo"=>$cargo,
        ":area"=>$area,
        ":clave_sga"=>$clavesga,
        ":estado"=>$estado
    ];

    $guardar_usuarioR->execute($marcadores);

    if($guardar_usuarioR->rowCount()==1){
        echo '

            <div class="notification is-info is-light" id="usuario_R" data-save="true">
                <strong>¡USUARIO R REGISTRADO!</strong><br>
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
    $guardar_usuarioR=null;