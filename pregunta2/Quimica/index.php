<?php
include "../conectar.php";
session_start();
$varsesion=$_SESSION['ci'];
$query = mysqli_query($con,"SELECT * FROM usuario WHERE ci = '0'");
if($varsesion==null || $varsesion==''){
	header("location:../index.php");
	die();
}
if(isset($_POST['nota'])) {
	$nombre = $_POST['nombre'];
	$ci = $_POST['ci'];
	$query = mysqli_query($con,"SELECT * FROM nota WHERE ci = '$varsesion'");
}
?>
<!DOCTYPE html>
<html lang="es-BO">

<head>
    <title>UMSA</title>
</head>
<link rel='stylesheet' type='text/css' href='../style.css' />

<body>
    <header id="cabeza">
        <div>
            <div>
                <ul>
                    <h2 class="title">FCPN Quimica</h2>
                    <li><a href="../salir.php">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div style="background-color: rgba(204, 204, 204, 0.8);">
		<h1>Carrera de Quimica</h1>
        <h2>Bienvenido <?php echo $_SESSION['nombre']?></h2><br>
    </div>
    <?php include "../notas.php";?>
    <?php include "../footer.php";?>