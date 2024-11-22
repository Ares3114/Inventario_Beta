<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Actualizar Celular</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['celular_id_up'])) ? $_GET['celular_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM celular WHERE id_celular='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><?php echo $datos['equipo']; ?></h2>

	<form action="./php/celular_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="id_celular" value="<?php echo $datos['id_celular']; ?>" required >
		
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Equipo</label>
					<input class="input" type="text" name="equipo" maxlength="70" required value="<?php echo $datos['equipo']; ?>">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Numero</label>
					<input class="input" type="text" name="numero" pattern="^[0-9]+$" maxlength="70" required value="<?php echo $datos['numero']; ?>">
				</div>
			</div>
		</div>

		<!-- Segunda sección: Mac Wifi, Mac Ethernet, Mac Change, IP -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Imei 1</label>
					<input class="input" type="text" name="imei_uno" pattern="^[0-9.-]+$" maxlength="25" value="<?php echo $datos['imei_uno']; ?>">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Imei Dos</label>
					<input class="input" type="text" name="imei_dos" pattern="^[0-9.-]+$" maxlength="25" required value="<?php echo $datos['imei_dos']; ?>">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Capacidad</label>
					<input class="input" type="text" name="capacidad" pattern="^[a-zA-Z0-9]+$" maxlength="25" required value="<?php echo $datos['capacidad']; ?>">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Asignado</label>
					<input class="input" type="text" name="asignado" pattern="^[a-zA-Z]+$" maxlength="25" required value="<?php echo $datos['asignado']; ?>">
				</div>
			</div>
		</div>

		<!-- Quinta sección: Categoría -->
		<div class="columns">
			<div class="column">
				<label>Categoría</label><br>
				<div class="select is-rounded">
					<select name="equipo_categoria">
						<option value="" selected="">Seleccione una opción</option>
						<?php
							$categorias = conexion();
							$categorias = $categorias->query("SELECT * FROM categoria");
							if ($categorias->rowCount() > 0) {
								$categorias = $categorias->fetchAll();
								foreach ($categorias as $row) {
									if($datos['categoria_id']==$row['categoria_id']){
    									echo '<option value="'.$row['categoria_id'].'" selected="" >'.$row['categoria_nombre'].' (Actual)</option>';
    								}else{
    									echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
    								}
								}
							}
							$categorias = null;
						?>
					</select>
				</div>
			</div>
		</div>

		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>