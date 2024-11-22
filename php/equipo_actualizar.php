<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_equipo']);


    /*== Verificando producto ==*/
	$check_producto=conexion();
	$check_producto=$check_producto->query("SELECT * FROM equipo WHERE id_equipo='$id'");

    if($check_producto->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El producto no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_producto->fetch();
    }
    $check_producto=null;


    /*== Almacenando datos ==*/
    //$codigo=limpiar_cadena($_POST['codigo']);
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
    if( $modelo=="" || $mac_ethernet=="" || $mac_change=="" || $ip =="" || $sistema_operativo=="" || $procesador=="" || 
        $capacidad_disco_duro=="" || $tipo_disco_duro=="" || $tipo_equipo=="" || $id_categoria==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando categoria 
    if($categoria!=$datos['categoria_id']){
	    $check_categoria=conexion();
	    $check_categoria=$check_categoria->query("SELECT categoria_id FROM categoria WHERE categoria_id='$categoria'");
	    if($check_categoria->rowCount()<=0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La categoría seleccionada no existe
	            </div>
	        ';
	        exit();
	    }
	    $check_categoria=null;
    }==*/

    /*== Actualizando datos ==*/
    $actualizar_equipo=conexion();
    $actualizar_equipo=$actualizar_equipo->prepare("UPDATE equipo SET modelo=:modelo,mac_wifi=:mac_wifi,mac_ethernet=:mac_ethernet,mac_change=:mac_change, 
    ip=:ip, sistema_operativo=:sistema_operativo, procesador=:procesador, capacidad_disco_duro=:capacidad_disco_duro, tipo_disco_duro=:tipo_disco_duro, tipo_equipo=:tipo_equipo WHERE id_equipo=:id_equipo");

    $marcadores=[
        //":codigo"=>$codigo,
        ":modelo"=>$modelo,
        ":mac_wifi"=>$mac_wifi,
        ":mac_ethernet"=>$mac_ethernet,
        ":mac_change"=>$mac_change,
        ":ip"=>$ip,
        ":sistema_operativo"=>$sistema_operativo,
        ":procesador"=>$procesador,
        ":capacidad_disco_duro"=>$capacidad_disco_duro,
        ":tipo_disco_duro"=>$tipo_disco_duro,
        ":tipo_equipo"=>$tipo_equipo,
        ":id_equipo"=>$id
    ];


    if($actualizar_equipo->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="equipo_actualizar" data-save="true">
                <strong>EQUIPO ACTUALIZADO!</strong><br>
                El Equipo se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_equipo=null;