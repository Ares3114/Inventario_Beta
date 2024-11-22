<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT * FROM usuarioU WHERE ((id_usuarioU!='".$_SESSION['id']."') AND (nombre LIKE '%$busqueda%' OR clave LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR asignado LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_usuarioU) FROM usuarioU WHERE ((id_usuarioU!='".$_SESSION['id']."') AND (nombre LIKE '%$busqueda%' OR clave LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR asignado LIKE '%$busqueda%'))";

	}else{

		$consulta_datos="SELECT * FROM usuarioU ";

		$consulta_total="SELECT COUNT(id_usuarioU) FROM usuarioU ";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='

	<div class="columns">
        <div class="column">
            <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="administrador">   
                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                    </p>
                    <p class="control">
                        <button class="button is-info" type="submit" >Buscar</button>
                    </p>
					<p class="control">
                        <a href="index.php?vista=usuarioU_new" class="button is-info" type="submit" >Nuevo</a>
                    </p>
                </div>
            </form>
        </div>
    </div>


	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr class="has-text-centered">
                        <th>#</th>
                        <th>usuario</th>
                        <th>nombre</th>
                        <th>clave</th>
                        <th>asignado</th>
                        <th>turno</th>
                        <th>cargo</th>
                        <th>estado</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td>'.$rows['usuario'].'</td>
                    <td>'.$rows['nombre'].'</td>
                    <td>'.$rows['clave'].'</td>
                    <td>'.$rows['asignado'].'</td>
                    <td>'.$rows['turno'].'</td>
                    <td>'.$rows['cargo'].'</td>
                    <td>'.$rows['estado'].'</td>
                    <td>
                        <a href="index.php?vista=usuarioU_update&user_id_up='.$rows['id_usuarioU'].'" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>                   
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando usuarios U <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}