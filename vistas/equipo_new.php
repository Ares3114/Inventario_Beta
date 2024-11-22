<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Nuevo Equipo</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/equipo_guardar.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data" >
		<!-- Primera sección: Código y Modelo -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Codigo</label>
					<input class="input" type="text" name="codigo" maxlength="70" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Modelo</label>
					<input class="input" type="text" name="modelo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
			</div>
		</div>

		<!-- Segunda sección: Mac Wifi, Mac Ethernet, Mac Change, IP -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Mac Wifi</label>
					<input class="input" type="text" name="mac_wifi" pattern="^[0-9.-]+$" maxlength="25" >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Mac Ethernet</label>
					<input class="input" type="text" name="mac_ethernet" pattern="^[0-9.-]+$" maxlength="25" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Mac Change</label>
					<input class="input" type="text" name="mac_change" pattern="^[0-9.-]+$" maxlength="25" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>IP</label>
					<input class="input" type="text" name="ip" pattern="^[0-9.-]+$" maxlength="25" required >
				</div>
			</div>
		</div>

		<!-- Tercera sección: Sistema Operativo y Procesador -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Sistema Operativo</label>
					<input class="input" type="text" name="sistema_operativo" maxlength="70" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Procesador</label>
					<input class="input" type="text" name="procesador" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
			</div>
		</div>

		<!-- Cuarta sección: Tipo de Disco Duro y Tipo de Equipo -->
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Capacidad Disco Duro</label>
					<input class="input" type="text" name="capacidad_disco_duro" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Tipo Disco Duro</label><br>
					<select name="tipo_disco_duro" id="opciones_turno1" class="input is-rounded">
						<?php
						// Ejemplo de datos para las opciones
						$opciones = [" ","HDD", "SSD"];
						
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
					<label>Tipo Equipo</label><br>
					<select name="tipo_equipo" id="tipo_equipo" class="input is-rounded">
						<?php
						// Ejemplo de datos para las opciones
						$opciones = [" ","PC", "LAPTOPS"];
						
						// Generar dinámicamente las opciones
						foreach ($opciones as $opcion) {
							echo "<option value='$opcion'>$opcion</option>";
						}
						?>
					</select>										
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
