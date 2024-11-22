<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="equipo.id_equipo,equipo.codigo,equipo.modelo,equipo.mac_wifi,equipo.mac_ethernet,equipo.mac_change,equipo.ip,equipo.sistema_operativo,equipo.procesador,
    		 equipo.capacidad_disco_duro,equipo.tipo_disco_duro,equipo.tipo_equipo,equipo.categoria_id,equipo.id_administrador,
			 categoria.categoria_id,categoria.categoria_nombre,administrador.id_administrador,administrador.nombre,administrador.apellidos";

	// Condiciones de la búsqueda
	if(isset($busqueda) && $busqueda!=""){
		$consulta_datos="SELECT $campos 
							FROM equipo 
							INNER JOIN categoria ON equipo.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON equipo.id_administrador = administrador.id_administrador 
							WHERE equipo.codigo LIKE '%$busqueda%' 
							ORDER BY equipo.modelo ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_equipo) FROM equipo WHERE equipo_codigo LIKE '%$busqueda%' OR equipo_modelo LIKE '%$busqueda%'";

	}elseif($categoria_id>0){
		$consulta_datos="SELECT $campos 
							FROM equipo 
							INNER JOIN categoria ON equipo.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON equipo.id_administrador = administrador.id_administrador 
							WHERE equipo.categoria_id = '$categoria_id' 
							ORDER BY equipo.modelo ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_equipo) FROM equipo WHERE categoria_id='$categoria_id'";

	}else{
		$consulta_datos="SELECT $campos 
							FROM equipo 
							INNER JOIN categoria ON equipo.categoria_id = categoria.categoria_id 
							INNER JOIN administrador ON equipo.id_administrador = administrador.id_administrador 
							ORDER BY equipo.modelo ASC 
							LIMIT $inicio, $registros";
		$consulta_total="SELECT COUNT(id_equipo) FROM equipo";
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
							<a href="index.php?vista=equipo_new" class="button is-success is-rounded">Nuevo</a>
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
								<strong>' . $contador . ' - ' . $rows['modelo'] . '</strong><br>
								<strong>CODIGO:</strong> ' . $rows['codigo'] . ', 
								<strong>MAC ETHERNET:</strong> ' . $rows['mac_ethernet'] . ', 
								<strong>IP:</strong> ' . $rows['ip'] . ', 
								<strong>CATEGORIA:</strong> ' . $rows['categoria_nombre'] . ', 
								<strong>REGISTRADO POR:</strong> ' . $rows['nombre'] . ' ' . $rows['apellidos'] . '
							</p>
						</div>

						<div class="has-text-right">
							<a href="index.php?vista=equipo_update&equipo_id_up=' . $rows['id_equipo'] . '" class="button is-success is-rounded is-small">Actualizar</a>
							<a href="'.$url.$pagina.'&equipo_id_del='.$rows['id_equipo'].'" class="button is-danger is-rounded is-small">Eliminar</a>
							
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
