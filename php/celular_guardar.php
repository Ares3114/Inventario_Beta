<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

	/*== Almacenando datos ==*/
	$equipo=limpiar_cadena($_POST['equipo']);
	$numero=limpiar_cadena($_POST['numero']);

	$imei_uno=limpiar_cadena($_POST['imei_uno']);
	$imei_dos=limpiar_cadena($_POST['imei_dos']);
	$capacidad=limpiar_cadena($_POST['capacidad']);

    $asignado=limpiar_cadena($_POST['asignado']);
    $id_categoria=limpiar_cadena($_POST['celular_categoria']);


	/*== Verificando campos obligatorios ==*/
    if($equipo=="" || $numero=="" || $imei_uno=="" || $imei_dos=="" || $capacidad =="" || $asignado=="" || $id_categoria==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando codigo ==
    $check_codigo=conexion();
    $check_codigo=$check_codigo->query("SELECT id_celular FROM celular WHERE codigo='$codigo'");
    if($check_codigo->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El CODIGO de BARRAS ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_codigo=null;*/

    /*== Guardando datos ==*/
    $guardar_celular = conexion();
    $guardar_celular = $guardar_celular->prepare("INSERT INTO celular(equipo, numero, imei_uno, imei_dos, capacidad, asignado, categoria_id, id_administrador)
                                                VALUES(:equipo, :numero, :imei_uno, :imei_dos, :capacidad, :asignado, :categoria_id, :id_administrador)");

    $marcadores = [
        ":equipo" => $equipo,
        ":numero" => $numero,
        ":imei_uno" => $imei_uno,
        ":imei_dos" => $imei_dos,
        ":capacidad" => $capacidad,
        ":asignado" =>$asignado,
        ":categoria_id" => $id_categoria,
        ":id_administrador" => $_SESSION['id'] 
    ];

    $guardar_celular->execute($marcadores);

    if ($guardar_celular->rowCount() == 1) {
        echo '
            <div class="notification is-info is-light" id="celular" data-save="true">
                <strong>CELULAR REGISTRADO!</strong><br>
                El Celular se registro con exito
            </div>
        ';
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_celular = null;

