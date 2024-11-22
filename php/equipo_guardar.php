<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

	/*== Almacenando datos ==*/
	$codigo=limpiar_cadena($_POST['codigo']);
	$modelo=limpiar_cadena($_POST['modelo']);

	$mac_wifi=limpiar_cadena($_POST['mac_wifi']);
	$mac_ethernet=limpiar_cadena($_POST['mac_ethernet']);
	$mac_change=limpiar_cadena($_POST['mac_change']);

    $ip=limpiar_cadena($_POST['ip']);
    $sistema_operativo=limpiar_cadena($_POST['sistema_operativo']);
    $procesador=limpiar_cadena($_POST['procesador']);
    $capacidad_disco_duro=limpiar_cadena($_POST['capacidad_disco_duro']);
    $tipo_disco_duro=limpiar_cadena($_POST['tipo_disco_duro']);
    $tipo_equipo=limpiar_cadena($_POST['tipo_equipo']);
    $id_categoria=limpiar_cadena($_POST['equipo_categoria']);


	/*== Verificando campos obligatorios ==*/
    if($codigo=="" || $modelo=="" || $mac_ethernet=="" || $mac_change=="" || $ip =="" || $sistema_operativo=="" || $procesador=="" || 
        $capacidad_disco_duro=="" || $tipo_disco_duro=="" || $tipo_equipo=="" || $id_categoria==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando codigo ==*/
    $check_codigo=conexion();
    $check_codigo=$check_codigo->query("SELECT id_equipo FROM equipo WHERE codigo='$codigo'");
    if($check_codigo->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El CODIGO de BARRAS ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_codigo=null;

    /*== Guardando datos ==*/
    $guardar_equipo = conexion();
    $guardar_equipo = $guardar_equipo->prepare("INSERT INTO equipo(codigo, modelo, mac_wifi, mac_ethernet, mac_change, ip, sistema_operativo, procesador, 
                                                capacidad_disco_duro, tipo_disco_duro, tipo_equipo, categoria_id, id_administrador)
                                                VALUES(:codigo, :modelo, :mac_wifi, :mac_ethernet, :mac_change, :ip, :sistema_operativo, :procesador, 
                                                :capacidad_disco_duro, :tipo_disco_duro, :tipo_equipo, :categoria_id, :id_administrador)");

    $marcadores = [
        ":codigo" => $codigo,
        ":modelo" => $modelo,
        ":mac_wifi" => $mac_wifi,
        ":mac_ethernet" => $mac_ethernet,
        ":mac_change" => $mac_change,
        ":ip" => $ip,
        ":sistema_operativo" => $sistema_operativo,
        ":procesador" => $procesador,
        ":capacidad_disco_duro" => $capacidad_disco_duro,
        ":tipo_disco_duro" => $tipo_disco_duro,
        ":tipo_equipo" => $tipo_equipo,
        ":categoria_id" => $id_categoria,
        ":id_administrador" => $_SESSION['id'] // Asegúrate de que 'id_administrador' está en la sesión
    ];

    $guardar_equipo->execute($marcadores);

    if ($guardar_equipo->rowCount() == 1) {
        echo '
            <div class="notification is-info is-light" id="equipo" data-save="true">
                <strong>EQUIPO REGISTRADO!</strong><br>
                El Equipo se registro con exito
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
    $guardar_equipo = null;

