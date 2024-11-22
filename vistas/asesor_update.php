<?php
	require_once "./php/main.php";

    $id = (isset($_GET['user_id_up'])) ? $_GET['user_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container is-fluid mb-6">
	<?php if($id==$_SESSION['id']){ ?>
		<h1 class="title">Mi cuenta</h1>
		<h2 class="subtitle">Actualizar los datos del ASESOR</h2>
	<?php }else{ ?>
		<h1 class="title">Usuarios</h1>
		<h2 class="subtitle">Actualizar Asesor</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php

		include "./inc/btn_back.php";

        /*== Verificando usuario ==*/
    	$check_usuario=conexion();
    	$check_usuario=$check_usuario->query("SELECT * FROM asesor WHERE id_asesor='$id'");

        if($check_usuario->rowCount()>0){
        	$datos=$check_usuario->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/asesor_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off"  >

		<input type="hidden" name="id_asesor" value="<?php echo $datos['id_asesor']; ?>" required >

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['nombre']; ?>" disabled> 
				</div>
		  	</div>
			<div class="column">
		    	<div class="control">
					<label>Apellido</label>
					<input class="input" type="text" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['apellido']; ?>" disabled>
				</div>
		  	</div>
		</div>

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>DNI</label>
					<input class="input" type="text" name="dni" maxlength="40" required value="<?php echo $datos['dni']; ?>"  disabled >
				</div>
			</div>

            <div class="column">
				<div class="control">
					<label>NUMERO CELULAR</label>
					<input class="input" type="text" name="num_celular" maxlength="40" required >
				</div>
			</div>

			<div class="column">
		    	<div class="control">
					<label>Turno</label><br>
					<select name="turno" id="opciones_turno1">
						<?php
						// Ejemplo de datos para las opciones
						$opciones = [" ","MAÑANA", "TARDE", "NOCHE", "FULL"];
						
						// Generar dinámicamente las opciones
						foreach ($opciones as $opcion) {
							echo "<option value='$opcion'>$opcion</option>";
						}
						?>
					</select>										
				</div>
		  	</div>	
		</div>

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>SALA </label><br>
						<select name="sala" id="opciones_cargo">
							<?php
							// Ejemplo de datos para las opciones
							$opciones = ["VENTAS 1", "VENTAS 2", "VENTAS 3", "VENTAS 4"];
							
							// Generar dinámicamente las opciones
							foreach ($opciones as $opcion) {
								echo "<option value='$opcion'>$opcion</option>";
							}
							?>
						</select>
				</div>
			</div>	
			<div class="column">
				<div class="control">
					<label>Estado </label><br>
						<select name="estado" id="opciones_cargo">
							<?php
							// Ejemplo de datos para las opciones
							$opciones = ["Activo", "Inactivo"];
							
							// Generar dinámicamente las opciones
							foreach ($opciones as $opcion) {
								echo "<option value='$opcion'>$opcion</option>";
							}
							?>
						</select>
				</div>
			</div>		
		</div>	

		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Actualizar</button>
		</p>

	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_usuario=null;
	?>
</div>

<style>
	select {
				width: 100%;
				padding: 8px;
				border: 1px solid #ccc;
				border-radius: 4px;
				margin-bottom: 12px;
				font-size: 16px;
			}
</style>