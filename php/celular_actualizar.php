<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_celular']);


    /*== Verificando producto ==*/
	$check_producto=conexion();
	$check_producto=$check_producto->query("SELECT * FROM celular WHERE id_celular='$id'");

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
    $numero=limpiar_cadena($_POST['numero']);
    $imei_uno=limpiar_cadena($_POST['imei_uno']);
    $imei_dos=limpiar_cadena($_POST['imei_dos']);
	$capacidad=limpiar_cadena($_POST['capacidad']);
	$asignado=limpiar_cadena($_POST['asignado']);



	/*== Verificando campos obligatorios ==*/
    if( $numero=="" || $imei_uno=="" || $imei_dos=="" || $imei_dos =="" || $capacidad=="" || $asignado==""){
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
    $actualizar_celular=conexion();
    $actualizar_celular=$actualizar_celular->prepare("UPDATE celular SET numero=:numero,imei_uno=:imei_uno,imei_dos=:imei_dos,capacidad=:capacidad, 
    asignado=:asignado WHERE id_celular=:id_celular");

    $marcadores=[
        //":codigo"=>$codigo,
        ":numero"=>$numero,
        ":imei_uno"=>$imei_uno,
        ":imei_dos"=>$imei_dos,
        ":capacidad"=>$capacidad,
        ":asignado"=>$asignado,
        ":id_celular"=>$id
    ];

    if($actualizar_celular->execute($marcadores)){
        echo '
            <div class="notification is-info is-light" id="celular_actualizar" data-save="true">
                <strong>¡ADMINISTRADOR REGISTRADO!</strong><br>
                El celular se actualizo con exito
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
    $actualizar_celular=null;