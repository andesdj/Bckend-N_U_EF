<?php
//Abrir el archivo JSON para tener acceso a los datos
$data = file_get_contents("data-1.json");
$dataDecoded = json_decode($data);
//Variables para aplicar filtros
$paramOK = (isset($_POST["fAply"]) && boolval($_POST["fAply"]));
$paramCity = $_POST["fCiudad"];
$paramType = $_POST["fTipo"];
$paramPriceLow = $_POST["fPrecioIni"];
$paramPriceHight = $_POST["fPrecioFin"];

$dataCity = true;
$dataType = true;
$dataPrice = true;

try {



	foreach($dataDecoded as $key => $json) {
	
		$precio = str_ireplace(["$",","], "", $json->Precio);
		$precio = intval($precio);
		$ciudadf = str_ireplace(["$",","], "", $json->Ciudad);
		$tipof= str_ireplace(["$",","], "", $json->Tipo);
	
		$dataPrice = ($precio >= intval($paramPriceLow) && $precio <= intval($paramPriceHight));

		if($paramOK){
			$dataCity =  ($ciudadf==$paramCity || $paramCity=="" || (!empty($paramCity) && $json->Ciudad == $paramCity));
			$dataType = ($tipof==$paramType || $paramType=="" || (!empty($paramType) && ($json->Tipo == $paramType)));
		}

		if($paramOK && !($dataCity && $dataType && $dataPrice)){
			continue;
		}
?>
 <div class="row">
   <div class="col m12">
      <div class="card horizontal itemMostrado">
        <img src="img/home.jpg">
        <div class="card-stacked">
          <div class="card-content">
            <?php
              foreach($json as $keyCit => $filtrado){
                $class = ($keyCit=="Precio") ? 'class="precioTexto"' : null;
                if($keyCit=="Id"){ continue; }
                echo "<p><strong>$keyCit:</strong> <span $class>$filtrado</span><p>";
              }
             ?>
          </div>
          <div class="card-action">
            <a href="#" class="precioTexto">VER MÁS</a>
          </div>
        </div>
      </div>
    </div>
 </div>
<?php
  }
}catch (Exception $err) {
  echo $err->getMessage();
}
?>