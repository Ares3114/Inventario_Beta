<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Nuevo Celular</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/celular_guardar.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data" >
		<!-- Primera sección: Código y Modelo -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Equipo</label>
					<input class="input" type="text" name="equipo" maxlength="70" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Numero</label>
					<input class="input" type="text" name="numero" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
			</div>
		</div>

		<!-- Segunda sección: Mac Wifi, Mac Ethernet, Mac Change, IP -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Imei 1</label>
					<input class="input" type="text" name="imei_uno" pattern="^[0-9.-]+$" maxlength="25" >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Imei Dos</label>
					<input class="input" type="text" name="imei_dos" pattern="^[0-9.-]+$" maxlength="25" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Capacidad</label>
					<input class="input" type="text" name="capacidad" pattern="^[0-9.-]+$" maxlength="25" required >
				</div>
			</div>
		</div>

		<!-- Tercera sección: Sistema Operativo y Procesador -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Asignado</label>
					<input class="input" type="text" name="asignado" maxlength="70" required >
				</div>
			</div>
		</div>

		<!-- Quinta sección: Categoría -->
		<div class="columns">
			<div class="column">
				<label>Categoría</label><br>
				<div class="select is-rounded">
					<select name="celular_categoria">
						<option value="" selected="">Seleccione una opción</option>
						<?php
							$categorias = conexion();
							$categorias = $categorias->query("SELECT * FROM categoria");
							if ($categorias->rowCount() > 0) {
								$categorias = $categorias->fetchAll();
								foreach ($categorias as $row) {
									echo '<option value="' . $row['categoria_id'] . '">' . $row['categoria_nombre'] . '</option>';
								}
							}
							$categorias = null;
						?>
					</select>
				</div>
			</div>
		</div>
		
		<!-- Botón de Guardar -->
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>
