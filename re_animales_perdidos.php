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
	<div id="wrapper">
		<h1><a href="index.html"><img src="img/logo.png" alt="Zooplus"></a></h1>
			<div id="nav">
				<h2>Resultado de tu b&#250;squeda de animales perdidos</h2>
			</div>
				<!-- RESULTADO DE LA BUSQUEDA -->
				<div id="resultado">
					<?php header ('Content-Type: text/html; charset=ISO-8859-1');
						$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_animals');

						$sql1 = "SELECT tbl_anunci.*, tbl_municipi.*, tbl_raca.*, tbl_contacte.*, tbl_tipus_animal.* ";

						$sql4 = "SELECT tbl_anunci.*, tbl_raca.*, tbl_contacte.*, tbl_tipus_animal.* ";
	
					if (!isset($_REQUEST['animal']) && !isset($_REQUEST['raza']) && !isset($_REQUEST['municipio'])) {

						$sql1.= "FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte, tbl_municipi
								 WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id";
		
						$datos = mysqli_query($con, $sql1);
							while($tbl_array = mysqli_fetch_array($datos)){
							echo "<h2>Anuncio</h2> ";
							echo "<p><span>Titulo: </span>".$tbl_array['anu_nom']."</p>";
							echo "<p><span>Fecha: </span>".$tbl_array['anu_data']."</p>";
							echo "<p><span>Contenido: </span>".$tbl_array['anu_contingut']."</p>";
							echo "<p><span>Raza animal: </span>".$tbl_array['raca_nom']."</p>";
							echo "<p><span>Estado del animal: </span>".$tbl_array['anu_tipus']."</p>";
								$fichero="img/$tbl_array[anu_foto]";
								if(file_exists($fichero)){
									echo "<p><span>Foto</p><img src='$fichero'></span>";
								}				
							echo "<h3>Contacto</h3>";
							echo "<p><span>Nombre: </span>".$tbl_array['contact_nom']."</p>";
							echo "<p><span>Tel&#233;fono: </span>".$tbl_array['contact_telf']."</p>";
							if (empty ($tbl_array['contact_adre'])) {
								echo "<p><span>Direcci&#243;n: </span>No hay direcci&#243;n en este contacto</p>";
							} else {
								echo "<p><span>Direcci&#243;n: </span>".$tbl_array['contact_adre']."</p>";
							}
						}

					}elseif (!isset($_REQUEST['raza']) && !isset($_REQUEST['municipio'])) {

						$sql1.= "FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte, tbl_municipi
								 WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id AND tbl_tipus_animal.tipus_anim_id=$_REQUEST[animal]";
						
						$datos = mysqli_query($con, $sql1);
							while($tbl_array = mysqli_fetch_array($datos)){
							echo "<h2>Anuncio:</h2><br/>";
							echo "<p><span>Titulo: </span>".$tbl_array['anu_nom']."</p>";
							echo "<p><span>Fecha: </span>".$tbl_array['anu_data']."</p>";
							echo "<p><span>Contenido: </span>".$tbl_array['anu_contingut']."</p>";
							echo "<p><span>Raza animal: </span>".$tbl_array['raca_nom']."</p>";
							echo "<p><span>Estado del animal: </span>".$tbl_array['anu_tipus']."</p>";
								$fichero="img/$tbl_array[anu_foto]";
								if(file_exists($fichero)){
									echo "<p><span>Foto</p><img src='$fichero'></span>";
								}		
							echo "<h3>Contacto</h3>";
							echo "<p><span>Nombre: </span>".$tbl_array['contact_nom']."</p>";
							echo "<p><span>Tel&#233;fono: </span>".$tbl_array['contact_telf']."</p>";
							if (empty ($tbl_array['contact_adre'])) {
								echo "<p><span>Direcci&#243;n: </span> No hay direcci&#243;n disponible";
							} else {
								echo "<p><span>Direcci&#243;n: </span>".$tbl_array['contact_adre']."</p>";
							}
			
						}

					} elseif(!isset($_REQUEST['animal']) && !isset($_REQUEST['raza'])) {

						$sql1.= " FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte, tbl_municipi
				 				  WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND tbl_anunci.mun_id=$_REQUEST[municipio]";

						$datos = mysqli_query($con, $sql1);

						if (mysqli_num_rows($datos)!=0) {
								while($tbl_array = mysqli_fetch_array($datos)){
							echo "<h2>Anuncio</h2>";
							echo "<p><span>Titulo: </span>".$tbl_array['anu_nom']."</p>";
							echo "<p><span>Fecha: </span>".$tbl_array['anu_data']."</p>";
							echo "<p><span>Contenido: </span>".$tbl_array['anu_contingut']."</p>";
							echo "<p><span>Raza animal: </span>".$tbl_array['raca_nom']."</p>";
							echo "<p><span>Estado del animal: </span>".$tbl_array['anu_tipus']."</p>";
								$fichero="img/$tbl_array[anu_foto]";
								if(file_exists($fichero)){
									echo "<p><span>Foto</p><img src='$fichero'></span>";
								}		
							echo "<h3>Contacto</h3>";
							echo "<p><span>Nombre: </span>".$tbl_array['contact_nom']."</p>";
							echo "<p><span>Tel&#233;fono: </span>".$tbl_array['contact_telf']."</p>";
								if (empty ($tbl_array['contact_adre'])) {
									echo "<p><span>Direcci&#243;n: </span>No hay direcci&#243;n en este contacto";
								} else {
									echo "<p><span>Direcci&#243;n: </span>".$tbl_array['contact_adre']."</p>";
								}
							}

						} else {
							echo "No hay resultados de busqueda";
							}
					}elseif(!isset($_REQUEST['raza'])) {
						$sql1.= "FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte, tbl_municipi
								 WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id AND tbl_tipus_animal.tipus_anim_id=$_REQUEST[animal] AND tbl_anunci.mun_id=$_REQUEST[municipio]";

						$datos = mysqli_query($con, $sql1);

						if (mysqli_num_rows($datos)!=0) {

							while($tbl_array = mysqli_fetch_array($datos)){
								echo "<h2>Anuncio:</h2>";
								echo "<p><span>Titulo: </span>".$tbl_array['anu_nom']."</p>";
								echo "<p><span>Fecha: </span>".$tbl_array['anu_data']."</p>";
								echo "<p><span>Contenido: </span>".$tbl_array['anu_contingut']."</p>";
								echo "<p><span>Raza animal: </span>".$tbl_array['raca_nom']."</p>";
								echo "<p><span>Tipo: </span>".$tbl_array['anu_tipus']."</p>";
									$fichero="img/$tbl_array[anu_foto]";
									if(file_exists($fichero)){
										echo "<p><span>Foto</p><img src='$fichero'></span>";
									}	
								echo "<h3>Contacto</h3>";
								echo "<p><span>Nombre: </span>".$tbl_array['contact_nom']."</p>";
								echo "<p><span>Tel&#233;fono: </span>".$tbl_array['contact_telf']."</p>";
									if (empty ($tbl_array['contact_adre'])) {
										echo "<p><span>Direcci&#243;n: </span> No hay direcci&#243;n disponible";
									} else {
										echo "<p><span>Direcci&#243;n: </span>".$tbl_array['contact_adre']."</p>";
									}			
							}
						} else {
							echo "No hay resultados de busqueda";
						}		

					}elseif(!isset($_REQUEST['municipio'])) {

						$sql4.= " FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte
				 				  WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.raca_id=$_REQUEST[raza]";

						$datos = mysqli_query($con, $sql4);

						if (mysqli_num_rows($datos)!=0) {
							while($tbl_array = mysqli_fetch_array($datos)){
							echo "<h2>Anuncio</h2>";
							echo "<p><span>Titulo: </span>".$tbl_array['anu_nom']."</p>";
							echo "<p><span>Fecha: </span>".$tbl_array['anu_data']."</p>";
							echo "<p><span>Contenido: </span>".$tbl_array['anu_contingut']."</p>";
							echo "<p><span>Raza animal: </span>".$tbl_array['raca_nom']."<br/>";
							echo "<p><span>Estado del animal: </span>".$tbl_array['anu_tipus']."</p>";
								$fichero="img/$tbl_array[anu_foto]";
								if(file_exists($fichero)){
									echo "<p><span>Foto</p><img src='$fichero'></span>";
								}	
							echo "<h3>Contacto</h3>";
							echo "<p><span>Nombre: </span>".$tbl_array['contact_nom']."</p>";
							echo "<p><span>Tel&#233;fono: </span>".$tbl_array['contact_telf']."</p>";
								if (empty ($tbl_array['contact_adre'])) {
									echo "<p><span>Direcci&#243;n: </span>No hay direcci&#243;n para este contacto";
								}else{
									echo "<p><span>Direcci&#243;n: </span>".$tbl_array['contact_adre']."</p>";
								}
							}
						}else{
							echo "No hay resultados de busqueda";
							}
					} else {
						$sql1.=" FROM tbl_anunci, tbl_raca, tbl_tipus_animal, tbl_contacte, tbl_municipi
								 WHERE tbl_anunci.raca_id=tbl_raca.raca_id AND tbl_anunci.contact_id=tbl_contacte.contact_id AND tbl_anunci.mun_id=tbl_municipi.municipi_id AND tbl_raca.tipus_anim_id=tbl_tipus_animal.tipus_anim_id AND tbl_anunci.raca_id=$_REQUEST[raza] AND tbl_anunci.mun_id=$_REQUEST[municipio]";

						$datos = mysqli_query($con, $sql1);

						if (mysqli_num_rows($datos)!=0) {

						while($tbl_array = mysqli_fetch_array($datos)){
							echo "<h2>Anuncio:</h2><br/>";
							echo "<p>Titulo :</span>".$tbl_array['anu_nom']."</p>";
							echo "<p>Fecha :</span>".$tbl_array['anu_data']."</p>";
							echo "<p>Contenido :</span>".$tbl_array['anu_contingut']."</p>";
							echo "<p>Raza animal :</span>".$tbl_array['raca_nom']."</p>";
							echo "<p>Tipo :</span>".$tbl_array['anu_tipus']."</p>";
								$fichero="img/$tbl_array[anu_foto]";
								if(file_exists($fichero)){
									echo "<p><span>Foto</p><img src='$fichero'></span>";
								}	
							echo "<h3>Contacto</h3>";
							echo "<p>Nombre :</span>".$tbl_array['contact_nom']."</p>";
							echo "<p>Tel&#233;fono :</span>".$tbl_array['contact_telf']."</p>";
							if (empty ($tbl_array['contact_adre'])) {
								echo "<p>Direcci&#243;n :</span> No hay direcci&#243;n disponible";
							} else {
								echo "<p>Direcci&#243;n :</span>".$tbl_array['contact_adre']."</p>";
							}
							}
						}else{
							echo "No hay resultados de busqueda";
							}
						}
					mysqli_close($con);
				?>
		</div>
	</div>
</body>
</html>