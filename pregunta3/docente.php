<?php
include "conectar.php";
session_start();
$ci = $_SESSION['ci'];
$query = mysqli_query($con,"SELECT * FROM persona WHERE ci = '$ci'");
$fila = mysqli_fetch_array($query);
$nombre=$fila["nombre"];

?>

<!DOCTYPE html>
<html lang="es-BO">

<head>
    <title>UMSA</title>
</head>
<link rel='stylesheet' type='text/css' href='style.css' />

<body>
    <header id="cabeza">
        <div>
            <div>
                <ul>
                    <h2 class="title">UMSA FCPN</h2>
                    <li><a href="salir.php">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </header>
    <h2>Bienvenido Docente <?php echo $nombre;?> </h2><br>
    <div align="center" style="background-color: rgba(204, 204, 204, 0.8);">
	<table id="customers">
        <tr>
            <th></th>
            <?php
					$query2 = mysqli_query($con,"SELECT depto FROM persona GROUP BY depto ORDER BY `persona`.`depto` ASC");
					while($fila2 = $query2->fetch_row()){
						if($fila2[0]=="01"){
							echo "<th>Sucre</th>";
						}
						if($fila2[0]=="02"){
							echo "<th>La Paz</th>";
						}
						if($fila2[0]=="03"){
							echo "<th>Cochabamba</th>";
						}
						if($fila2[0]=="04"){
							echo "<th>Oruro</th>";
						}
						if($fila2[0]=="05"){
							echo "<th>Potosi</th>";
						}
						if($fila2[0]=="06"){
							echo "<th>Tarija</th>";
						}
						if($fila2[0]=="07"){
							echo "<th>Santa Cruz</th>";
						}
						if($fila2[0]=="08"){
							echo "<th>Beni</th>";
						}
						if($fila2[0]=="09"){
							echo "<th>Pando</th>";
						}
					}
				?>
        </tr>
        <?php
				$query3 = mysqli_query($con,"SELECT sigla FROM nota group by sigla");
				while($fila3 = $query3->fetch_row()){
					echo "<tr>";
					echo "<td>$$fila3[0]</td>";
					$query4 = mysqli_query($con,"select n.sigla,p.depto,n.notaFinal from persona p, nota n WHERE n.ci=p.ci ORDER BY `p`.`depto` ASC");
					while($fila4 = $query4->fetch_row()){
						if($fila4[0]==$fila3[0]){
							if($fila4[1]=="01"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="02"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="03"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="04"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="05"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="06"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="07"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="08"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
							if($fila4[1]=="09"){
								echo "<td>$fila4[2]</td>";
							}else{
								echo "<td>0</td>";
							}
						}
					}
					echo "</tr>";
				}
			?>
    </table>
	</div>
    <?php
		?>
    <?php
include "footer.php";