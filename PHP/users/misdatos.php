<!DOCTYPE html>
<html lang="Spanish">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline</title>
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/estilos.css">
    <script src="../styles/js/bootstrap.js"></script>
    <script src="../styles/js/jquery.js"></script>
</head>

<body>
    <div class="container-fluid" id="fondo">
        <div class="row fondo2"> </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="container-fluid recuadro2">
                    <div class="row">
                        <?php
         include('../config/conection.php');
         include('../config/head.php');
         include('../config/compruebasesion.php');
         ?>
                    </div>
                    <hr />
                    <div class="row">
                        <form method="post">
                            <div class="col-md-12">
                                <div class="table-responsive colorwhite">
                                    <table class="table table-responsive">
                                        <tr>
                                            <td><strong>Nombre</strong></td>
                                            <td><strong>Apellidos</strong></td>
                                            <td><strong>password</strong></td>
                                            <td><strong>Email</strong></td>
                                        </tr>
                                        <?php
                $codcli=$_SESSION['idusuario'];
                $consultacliente="SELECT * FROM usuario WHERE idusuario='$codcli';";
                $result=$connection->query($consultacliente);
                    while($obj = $result->fetch_object()) {
                    echo"<tr>";
                        echo"<td><input class='form-control' type='text' name='nom' value='$obj->nombre'></td>";
                        echo"<td><input class='form-control' type='text' name='ape' value='$obj->apellidos'></td>";
                        echo"<td><input class='form-control' type='text' name='pas' value=''></td>";
                        echo"<td><input class='form-control' type='email' name='ema' value='$obj->email'></td>";
                    echo"</tr>";
                    };
                ?>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input type="submit" name="guardar" class="btn btn-danger alignright margin1" value="Guardar">
                            <?php
                if (isset($_POST["guardar"])) {
                $nuevonom=$_POST['nom'];
                $nuevoape=$_POST['ape'];
                $nuevopassword=$_POST['pas'];
                $nuevoemail=$_POST['ema'];
                if(!$nuevopassword==''){
                $actualizar="UPDATE `usuario` SET `nombre`='$nuevonom',`apellidos`='$nuevoape',`password`=md5('$nuevopassword'),`email`='$nuevoemail' WHERE idusuario='$codcli';";
                    $connection->query($actualizar);
                    echo "<h1 class='colorwhite'>Datos actualizados</h1>";
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../index.php">';
                }else{
                    $actualizar="UPDATE `usuario` SET `nombre`='$nuevonom',`apellidos`='$nuevoape',`email`='$nuevoemail' WHERE idusuario='$codcli';";
                    $connection->query($actualizar);
                    echo "<h1 class='colorwhite'>Datos actualizados</h1>";
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../index.php">';
                }
                
                };
                ?> </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
<?php
include('../config/footer.php');
?>

</html>