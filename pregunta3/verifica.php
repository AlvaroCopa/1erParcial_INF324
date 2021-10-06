<?php
include("conectar.php");
if(isset($_POST['login'])){
    $ci=$_POST["ci"];
    $password=$_POST["comtraseña"];
    session_start();
    $_SESSION["ci"]=$ci;
    $consulta = mysqli_query($con,"SELECT * FROM usuario WHERE ci = '$ci' AND password = '$password'");
    $filas=mysqli_num_rows($consulta);
    $consulta2 = mysqli_query($con,"SELECT * FROM persona WHERE ci = '$ci'");
    $fila2 = mysqli_fetch_array($consulta2);
	$nombre=$fila2["nombre"];
    $_SESSION["nombre"]=$nombre;
    $fila = mysqli_fetch_array($consulta);
    if($fila['rol']== 1){
        header("location:docente.php");
    }
    else{
        if($filas){
            $carrera=$fila["carrera"];
            switch ($carrera){
                case 1:
                    header("location:Biologia/index.php");
                    break;
                case 2:
                    header("location:Quimica/index.php");
                    break;
                case 3:
                    header("location:Estadistica/index.php");
                    break;
                case 4:
                    header("location:Fisica/index.php");
                    break;
                case 5:
                    header("location:Informatica/index.php");
                    break;
                case 6:
                    header("location:Matematica/index.php");
                    break;
                default:
                    header("location:index.php");
    
            }
        }else{
            ?>
            <?php
                include("index.php");
            ?>
            <div align="center" style="background-color: rgba(204, 204, 204, 0.8);">
                <h1 style="color:red">ERROR EN LA AUTENTIFICACION</h1>
            </div>
            <?php
        }
    }
}
mysqli_free_result($consulta);
mysqli_close($con);
?>