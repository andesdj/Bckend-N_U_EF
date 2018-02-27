<?php
	$dataJ = file_get_contents("data-1.json");
	$dataJson = json_decode($dataJ, true);
	
	foreach ( $dataJson as $data ) {
		$todos = "<div class='itemMostrado card'>";
		$todos .="<img src='img/home.jpg' alt='Demo'>";
		$todos .="<div class='card-stacked'>";
		$todos .="<strong>Dirección: </strong>".$data["Direccion"]."</br>";
		$todos .="<strong>Ciudad: </strong>".$data["Ciudad"]."</br>";
		$todos .="<strong>Teléfono: </strong>".$data["Telefono"]."</br>";
		$todos .="<strong>Código Postal: </strong>".$data["Codigo_Postal"]."</br>";
		$todos .="<strong>Tipo: </strong>".$data["Tipo"]."</br>";
		$todos .="<strong>Precio: </strong><span class='precioTexto'>".$data["Precio"]."</span></br>";
		$todos .="<div class='card-action'>VENTAS</div>";
		$todos .="</div>";
		$todos .= "</div>";
		echo $todos;
	}


?>	