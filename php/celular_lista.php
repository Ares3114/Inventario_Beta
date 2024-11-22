<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="celular.id_celular, celular.equipo, celular.numero, celular.imei_uno, celular.imei_dos, celular.capacidad, celular.asignado, celular.categoria_id, celular.id_administrador,
             categoria.categoria_id, categoria.categoria_nombre, administrador.id_administrador, administrador.nombre, administrador.apellidos";

	// Condiciones de la búsqueda
	if(isset($busqueda) && $busqueda!=""){
		$consulta_datos="SELECT $campos 
							FROM celular 
							INNER JOIN categoria ON celular.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON celular.id_administrador = administrador.id_administrador 
							WHERE celular.equipo LIKE '%$busqueda%' 
							ORDER BY celular.numero ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_celular) FROM celular WHERE celular.equipo LIKE '%$busqueda%' OR celular.numero LIKE '%$busqueda%'";

	}elseif($categoria_id>0){
		$consulta_datos="SELECT $campos 
							FROM celular 
							INNER JOIN categoria ON celular.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON celular.id_administrador = administrador.id_administrador 
							WHERE celular.categoria_id = '$categoria_id' 
							ORDER BY celular.equipo ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_celular) FROM celular WHERE categoria_id='$categoria_id'";

	}else{
		$consulta_datos="SELECT $campos 
							FROM celular 
							INNER JOIN categoria ON celular.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON celular.id_administrador = administrador.id_administrador 
							ORDER BY celular.equipo ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_celular) FROM celular";
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas = ceil($total/$registros);

	// Barra de búsqueda y botones
	$tabla .= '
		<div class="columns">
			<div class="column">
				<form action="" method="GET" autocomplete="off">
					<div class="field is-grouped">
						<p class="control is-expanded">
							<input class="input is-rounded" type="text" name="busqueda" placeholder="¿Qué estas buscando?" value="' . (isset($busqueda) ? $busqueda : '') . '" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30">
						</p>
						<p class="control">
							<button class="button is-info" type="submit">Buscar</button>
						</p>
						<p class="control">
							<a href="index.php?vista=celular_new" class="button is-success is-rounded">Nuevo</a>
						</p>
					</div>
				</form>
			</div>
		</div>
	';

	if($total >= 1 && $pagina <= $Npaginas){
		$contador = $inicio + 1;
		$pag_inicio = $inicio + 1;

		foreach($datos as $rows){
			$tabla .= '
				<article class="media">
					<figure class="media-left">
						<p class="image is-64x64">';
// Aquí puedes agregar la lógica de imagen si es necesario.
			$tabla .= '</p>
					</figure>
					<div class="media-content">
						<div class="content">
							<p>
								<strong>' . $contador . ' - ' . $rows['equipo'] . '</strong><br>
								<strong>Numero:</strong> ' . $rows['numero'] . ', 
								<strong>Capacidad:</strong> ' . $rows['capacidad'] . ', 
								<strong>Asignado :</strong> ' . $rows['asignado'] . ', 
								<strong>CATEGORIA:</strong> ' . $rows['categoria_nombre'] . ', 
								<strong>REGISTRADO POR:</strong> ' . $rows['nombre'] . ' ' . $rows['apellidos'] . '
							</p>
						</div>

						<div class="has-text-right">
							<a href="index.php?vista=celular_update&celular_id_up=' . $rows['id_celular'] . '" class="button is-success is-rounded is-small">Actualizar</a>
							<a href="'.$url.$pagina.'&celular_id_del='.$rows['id_celular'].'" class="button is-danger is-rounded is-small">Eliminar</a>
							
						</div>
					</div>
				</article>
				<hr>';
			$contador++;
		}

		$pag_final = $contador - 1;
	}else{
		if($total >= 1){
			$tabla .= '
				<p class="has-text-centered">
					<a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>';
		}else{
			$tabla .= '
				<p class="has-text-centered">No hay registros en el sistema</p>';
		}
	}

	if($total > 0 && $pagina <= $Npaginas){
		$tabla .= '<p class="has-text-right">Mostrando equipos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
	}

	$conexion = null;
	echo $tabla;

	if($total >= 1 && $pagina <= $Npaginas){
		echo paginador_tablas($pagina, $Npaginas, $url, 7);
	}
?>
