<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Checklist</title>
    <link rel="stylesheet" type="text/css" href="check.css">
</head>
<body>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos enviados desde el formulario
        $nombre_ambiente = $_POST['nombre_ambiente'];
        $numero_maquina = $_POST['numero_maquina'];
        $fecha = $_POST['fecha'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $maquinas_piezas = isset($_POST['maquinas_piezas']) ? 1 : 0;
        $harneros = isset($_POST['harneros']) ? 1 : 0;
        $mesa = isset($_POST['mesa']) ? 1 : 0;
        $baldes = isset($_POST['baldes']) ? 1 : 0;
        $paneras = isset($_POST['paneras']) ? 1 : 0;
        $jarras = isset($_POST['jarras']) ? 1 : 0;
        $mallas = isset($_POST['mallas']) ? 1 : 0;
        $balanzas = isset($_POST['balanzas']) ? 1 : 0;
        $calador = isset($_POST['calador']) ? 1 : 0;
        $piso_entorno = isset($_POST['piso_entorno']) ? 1 : 0;
        $n_SOdesin = $_POST['n_SOdesin'];
        $r_revision = $_POST['r_revision'];
        $especie = $_POST['especie'];
        $variedad = $_POST['variedad'];
        $n_registro = $_POST['n_registro'];
        $observaciones = $_POST['observaciones'];

        // Realizar validaciones de los datos si es necesario

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "gabriel20-";
        $dbname = "formulario";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión a la base de datos
        if ($conn->connect_error) {
            die("Error al conectar con la base de datos: " . $conn->connect_error);
        }

        // Preparar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO checklist (nombre_ambiente, numero_maquina, fecha, hora_inicio, hora_fin, maquinas_piezas, harneros, mesa, baldes, paneras, jarras, mallas, balanzas, calador, piso_entorno, n_SOdesin, r_revision, especie, variedad, n_registro, observaciones)
        VALUES ('$nombre_ambiente', '$numero_maquina', '$fecha', '$hora_inicio', '$hora_fin', '$maquinas_piezas', '$harneros', '$mesa', '$baldes', '$paneras', '$jarras', '$mallas', '$balanzas', '$calador', '$piso_entorno', '$n_SOdesin', '$r_revision', '$especie', '$variedad', '$n_registro', '$observaciones')";

        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Los datos se han guardado correctamente en la base de datos.";
            header("Location: index.php");
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    }
    ?>

    <div class="container">
        <h2>Formulario de Checklist</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="nombre_ambiente">Nombre del Ambiente:</label>
                <input type="text" name="nombre_ambiente" id="nombre_ambiente" required>
            </div>
            <div class="form-group">
                <label for="numero_maquina">Número de Máquina:</label>
                <input type="number" name="numero_maquina" id="numero_maquina" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" required>
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" name="hora_fin" id="hora_fin" required>
            </div>
            <div class="form-group">
                <label for="maquinas_piezas">Máquinas piezas:</label>
                <input type="checkbox" name="maquinas_piezas" id="maquinas_piezas" id="maquinas_piezas" value="1">
            </div>
            <div class="form-group">
                <label for="harneros">Harneros:</label>
                <input type="checkbox" name="harneros" id="harneros" value="1">

            </div>
            <div class="form-group">
                <label for="mesa">Mesa:</label>
                <input type="checkbox" name="mesa" id="mesa" value="1">
            </div>
            <div class="form-group">
                <label for="baldes">Baldes:</label>
                <input type="checkbox" name="baldes" id="baldes" value="1">
            </div>
            <div class="form-group">
                <label for="paneras">Paneras:</label>
                <input type="checkbox" name="paneras" id="paneras" value="1">
            </div>
            <div class="form-group">
                <label for="jarras">Jarras:</label>
                <input type="checkbox" name="jarras" id="jarras" value="1">
            </div>
            <div class="form-group">
                <label for="mallas">Mallas:</label>
                <input type="checkbox" name="mallas" id="mallas" value="1">
            </div>
            <div class="form-group">
                <label for="balanzas">Balanzas:</label>
                <input type="checkbox" name="balanzas" id="balanzas" value="1">
            </div>
            <div class="form-group">
                <label for="calador">Calador:</label>
                <input type="checkbox" name="calador" id="calador" value="1">
            </div>
            <div class="form-group">
                <label for="piso_entorno">Piso y entorno:</label>
                <input type="checkbox" name="piso_entorno" id="piso_entorno" value="1">
            </div>
            <div class="form-group">
                <label for="n_SOdesin">Número de SOdesin:</label>
                <select name="n_SOdesin" id="n_SOdesin" required>
                <option value="2">2</option>
                <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="r_revision">Revisión:</label>
                <input type="text" name="r_revision" id="r_revision" required>
            </div>
            <div class="form-group">
                <label for="especie">Especie:</label>
                <input type="text" name="especie" id="especie" required>
            </div>

            <div class="form-group">
                <label for="variedad">Variedad:</label>
                <input type="text" name="variedad" id="variedad" required>
            </div>
            <div class="form-group">
                <label for="n_registro">N_Registro:</label>
                <input type="text" name="n_registro" id="n_registro" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <textarea name="observaciones" id="observaciones" required></textarea>
            </div>


            <div class="form-group">
                <input type="submit" value="Guardar" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
