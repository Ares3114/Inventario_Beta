

<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario R</h2>

</div>


<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/usuarioR_guardar.php" method="POST" class="FormularioAjax" autocomplete="off"  >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="usuario"  maxlength="40" required >
				</div>
			</div>
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
			<div class="column">
		    	<div class="control">
					<label>Clave</label>
					<input class="input" type="text" name="clave"  maxlength="40" required >
				</div>
		  	</div>
		</div>

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Asignado 1</label>
					<input class="input" type="text" name="asignadouno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
			</div>
			<div class="column">
		    	<div class="control">
					<label>Turno 1</label><br>
					<select name="turnouno" id="opciones_turno1">
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
					<label>Asignado 2</label>
					<input class="input" type="text" name="asignadodos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40">
				</div>
			</div>
			<div class="column">
		    	<div class="control">
					<label>Turno 2</label><br>
					<select name="turnodos" id="opciones_turno2">
						
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
					<label>Cargo </label><br>
					<select name="cargo" id="opciones_cargo">
						<?php
						// Ejemplo de datos para las opciones
						$opciones = ["SUPERVISOR", "ADMINISTRADOR", "ASESOR"];
						
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
					<label>Area</label><br>
					<select name="area" id="opciones_area">
						<?php
						// Ejemplo de datos para las opciones
						$opciones = ["VENTAS", "BACKOFFICE", "EXPEDIENTES", "COBRANZAS"];
						
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
					<label>Clave SGA </label>
					<input class="input" type="text" name="clavesga" maxlength="40" >
				</div>
			</div>
			<div class="column">
		    	<div class="control">
					<label>Estado</label><br>
						<select name="estado" id="opciones_estado">
							<?php
							// Ejemplo de datos para las opciones
							$opciones = ["ACTIVO", "INACTIVO", "BLOQUEADO"];
							
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
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>

	</form>
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