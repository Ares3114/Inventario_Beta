<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    $nombre=limpiar_cadena($_POST['nombre']);
    $apellido=limpiar_cadena($_POST['apellido']);

    $dni=limpiar_cadena($_POST['dni']);
    $num_celular=limpiar_cadena($_POST['num_celular']);
    $turno=limpiar_cadena($_POST['turno']);

    $sala=limpiar_cadena($_POST['sala']);
    $estado=limpiar_cadena($_POST['estado']);



    /*== Verificando campos obligatorios ==*/
    if($nombre=="" || $apellido=="" || $dni=="" || $num_celular=="" || $turno=="" || $sala=="" || $estado==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando asesor ==*/
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT nombre FROM asesor WHERE nombre='$nombre'");
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
    $guardar_asesor=conexion();
    $guardar_asesor=$guardar_asesor->prepare("INSERT INTO asesor(nombre,apellido,dni,num_celular,turno,sala, estado) VALUES(:nombre,:apellido,:dni,:num_celular,:turno,:sala,:estado)");

    $marcadores=[

        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":dni"=>$dni,
        ":num_celular"=>$num_celular,
        ":turno"=>$turno,
        ":sala"=>$sala,
        ":estado"=>$estado
    ];

    $guardar_asesor->execute($marcadores);

    if($guardar_asesor->rowCount()==1){
        echo '
            <div class="notification is-info is-light" id="usuario_asesor" data-save="true">
                <strong>ASESOR REGISTRADO!</strong><br>
                El Asesor se registro con exito
            </div>
        ';
        
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el asesor, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_asesor=null;