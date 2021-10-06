<?php
session_start();
$varsesion=$_SESSION['ci'];
if($varsesion==null || $varsesion==''){
	header("location:../index.php");
	die();
}

?>
<!DOCTYPE html>
<html lang="es-BO">

<head>
    <title>UMSA</title>
</head>
<link rel='stylesheet' type='text/css' href='/pregunta1/style.css' />

<body>
    <header id="cabeza">
        <div>
            <div>
                <ul>
                    <h2 class="title">FCPN Fisica</h2>
                    <li><a href="../salir.php">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div style="background-color: rgba(204, 204, 204, 0.8);">
		<h1>Carrera de Fisica</h1>
        <h2>Bienvenido <?php echo $_SESSION['nombre']?></h2><br>
    </div>
<?php include "../footer.php";?>