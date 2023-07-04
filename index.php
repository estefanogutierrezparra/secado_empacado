<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "gabriel20-";
$dbname = "formulario";

$conn = mysqli_connect ($servername, $username, $password, $dbname);

if(!$conn){
  echo"Error en la conecion con el servidor";
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Formulario</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-image: url("images/natucultura.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      
    }
    </style>
      
    
  <script>
  function limitarLongitudId() {
    var idInput = document.forms["formulario"]["id"];
    if (idInput.value.length > 6) {
      idInput.value = idInput.value.slice(0, 6);
    }
  }
</script>
</head>
<body>


  <form action="#" name="formulario" method="POST">

  <h2>Hola</h2>
  <p>Registre correctamente por favor</P>

  <div class="input-wrapper">
      <input type="text" name="id" placeholder="N°Registro" maxlength="6" oninput="limitarLongitudId()">
      <img class="input-icon" src="images/file-list.svg" alt="">
    </div>

    <div class="input-wrapper">
      <input type="text" name="codigo" placeholder="codigo">
      <img class="input-icon" src="images/smile.svg" alt="">
    </div>

    <div class="input-wrapper">
      <input type="text" name="descarte" placeholder="descarte">
      <img class="input-icon" src="images/trash.svg" alt="">
    </div>

    <div class="input-wrapper">
      <input type="time" name="hora_inicial" placeholder="hora_inicial">
      <img class="input-icon" src="images/clock.svg" alt="">
    </div>

    <div class="input-wrapper">
    <input type="time" name="hora_final" placeholder="hora_final">
    <img class="input-icon" src="images/clock.svg" alt="">
    </div>

    <div class="input-wrapper">
    <input type="date" name="fecha" placeholder="fecha">
    <img class="input-icon" src="images/calendar.svg" alt="">
    </div>

    <div class="input-wrapper">
    <input type="text" name="nombre_maquina" placeholder="nombre_maquina">
    <img class="input-icon" src="images/artboard.svg" alt="">
    </div>


    <input class="btn" type="submit" name="enviar">
    <input class="btn" type="reset">
  </form>

  <?php
if (isset($_POST['enviar'])) {
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $descarte = $_POST['descarte'];
    $hora_inicial = $_POST['hora_inicial'];
    $hora_final = $_POST['hora_final'];
    $fecha = $_POST['fecha'];
    $nombre_maquina = $_POST['nombre_maquina'];

    $insertarDatos = "INSERT INTO datos (id, codigo, descarte, hora_inicial, hora_final, fecha, nombre_maquina) VALUES ('$id', '$codigo', '$descarte', '$hora_inicial', '$hora_final', '$fecha', '$nombre_maquina')";

    $ejecutarInsertar = mysqli_query($conn, $insertarDatos);

    if ($ejecutarInsertar) {
        echo "<script>window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "<h3 class='error'>Ocurrió un error al insertar los datos.</h3>";
    }
}
?>


  <br>
    <table border="1">
      <tr>
        <td>id</td>
        <td>codigo</td>
        <td>descarte</td>
        <td>hora_inicial</td>
        <td>hora_final</td>
        <td>fecha</td>
        <td>nombre_maquina</td>
      </tr>

      <?php
      $sql="SELECT * FROM datos";
      $result=mysqli_query($conn,$sql);

      while($mostrar=mysqli_fetch_array($result)){
        ?>

      <tr>
        <td><?php echo $mostrar['id'] ?></td>
        <td><?php echo $mostrar['codigo'] ?></td>
        <td><?php echo $mostrar['descarte'] ?></td>
        <td><?php echo $mostrar['hora_inicial'] ?></td>
        <td><?php echo $mostrar['hora_final'] ?></td>
        <td><?php echo $mostrar['fecha'] ?></td>
        <td><?php echo $mostrar['nombre_maquina'] ?></td>      
      </tr>  
    <?php
    }
    ?>
    </table>

    <?php
    
    ?>
    </table>

</body>



