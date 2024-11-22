

<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo asesor</h2>

</div>


<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/asesor_guardar.php" method="POST" class="FormularioAjax" autocomplete="off"  >
		<div class="columns">

		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
			<div class="column">
		    	<div class="control">
					<label>Apellidos</label>
					<input class="input" type="text" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>DNI</label>
					<input class="input" type="text" name="dni" maxlength="40" required >
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
							$opciones = ["Activo"];
							
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