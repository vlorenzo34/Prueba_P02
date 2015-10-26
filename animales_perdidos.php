<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Animales Perdidos</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#animal").change(function () {
			    $("#animal option:selected").each(function () {
			        elegido=$(this).val();
			        $.post("animales_perdidos.php",{ elegido: elegido }, function(data){
			        $("#raza").html(data);
			    	});            
				});
	   		});
		});
	</script>
</head>
<body>
<?php  
	if (isset($_POST["elegido"])){
		$options="";
			if ($_POST["elegido"]==1){
				$options= '
				<option disabled selected>Selecciona la raza del animal</option>
			    <option value="8">B&oacute;xer</option>
			    <option value="9">Pastor aleman</option>
			    <option value="10">Golden retriever</option>
			    <option value="11">Husky</option>
			    <option value="12">Border collie</option>
			    <option value="13">Cruzado</option>
			    <option value="14">Beagle</option>'; 
				}	
				if ($_POST["elegido"]==2){
				$options= '
				<option disabled selected>Selecciona la raza del animal</option>
			    <option value="19">Bobtail</option>
			    <option value="18">Abisinio</option>
			    <option value="17">Comun</option>
			    <option value="16">Siam&#233;s</option>
			    <option value="15">Persa</option>';   
				}
				if ($_POST["elegido"]==3){
			    $options= '
			    <option disabled selected>Selecciona la raza del animal</option>
			    <option value="20">Canario</option>
			    <option value="21">Periquito</option>';       
				}
				if ($_POST["elegido"]==4){
			    $options= '
			    <option disabled selected>Selecciona la raza del animal</option>
			    <option value="22">Fura</option>
				<option value="23">Conejo</option>
				<option value="24">Hamster</option>
				<option value="25">Tej&oacute;n</option>
				<option value="26">Pato</option>';    
				}
		echo $options;    
	}
?>
	<div id="wrapper">
		<h1><a href="index.html"><img src="img/logo.png" alt="Zooplus"></a></h1>
			<div id="nav">
				<h2>&Uacute;ltimos anuncios de animales perdidos</h2>
			</div>
				<!-- FORMULARIO ULTIMOS PERDIDOS -->
				<form id="form1" action="#" method="POST">	
					<?php header('Content-Type: text/html; charset=ISO-8859-1');
						$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_animals');

						$sql = "SELECT tbl_anunci.*, tbl_raca.raca_nom, tbl_raca.raca_id, tbl_municipi.municipi_id, tbl_municipi.municipi_nom
								FROM tbl_anunci, tbl_raca, tbl_municipi 
								WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND anu_tipus='Perdut' ORDER BY anu_data DESC LIMIT 0,3";
										
						$datos = mysqli_query($con, $sql);
						while($tbl_array = mysqli_fetch_array($datos))
							{
								echo "<div class='section'>";
									echo "<p>Anuncio</p> ".$tbl_array['anu_nom'];
									echo "<p>Raza del animal</p>".$tbl_array['raca_nom'];
									echo "<p>Fecha de la desaparici&oacute;n</p>".$tbl_array['anu_data'];
									echo "<p>Municipio</p>".$tbl_array['municipi_nom'];
									echo "<p>Descripci&oacute;n</p>".$tbl_array['anu_contingut'];
										$fichero="img/$tbl_array[anu_foto]";
										if(file_exists($fichero)){
												echo "<p>Foto</p><img src='$fichero'>";
										}						
								echo "</div>";
							}
					 ?>
				</form>
				<!-- FORMULARIO DE BUSQUEDA ANIMALEES PERDIDOS -->
				<div id="busqueda">
					<h2>FORMULARIO DE B&#218;SQUEDA</h2>
					<form action="re_animales_perdidos.php" method="POST">
						<!-- <p>Estado</p>
						<input type="radio" name="estado_animal" value="perdut"> Encontrado
						<input type="radio" name="estado_animal" value="trobat"> Perdido -->
						<p>Animal</p>
							<select name="animal" id="animal">
								<option disabled selected>Selecciona que animal buscas</option>
								<option value="1">Perro</option>
								<option value="2">Gato</option>
								<option value="3">Ave</option>
								<option value="4">Otros</option>
							</select>
						<p>Raza</p>
							<select name="raza" id="raza">
								<option disabled selected>Seleccion automatica</option>
							</select>
						<p>Municipio</p>
							<select name="municipio" id="municipio">
								<option disabled selected>Selecciona el municipio</option>
								<option value="1">Barcelona</option>
								<option value="2">Sant Feliu de Llobregat</option>
								<option value="3">Sant Joan d'Esp&#237;</option>
								<option value="4">El Prat de Llobregat</option>
								<option value="5">L'Hospitalet de Llobregat</option>
								<option value="6">Martorell</option>
								<option value="7">Cornell&#224; de Llobregat</option>
								<option value="8">Castelldefels</option>
								<option value="9">Viladecans</option>
								<option value="10">Begues</option>
								<option value="11">Castellbisbal</option>
								<option value="12">Sant Sadurn&#237; d'Anoia</option>
								<option value="13">Rub&#237;</option>
								<option value="14">Sant Cugat del Vall&#232;s</option>
								<option value="15">Sitges</option>
							</select>
							<p><input type="submit" value="Buscar"><input type="reset" value="Cancelar"></p>
					</form>
				</div>
	</div>
</body>
</html>