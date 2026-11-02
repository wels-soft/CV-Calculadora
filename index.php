<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CV y Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- BLOQUE 1: CALCULADORA ARRIBA -->
    <div class="contenedor">
        <h2>Calculadora Básica en PHP Puro</h2>
        
        <?php
        $pantalla = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pantalla_actual = isset($_POST['pantalla']) ? $_POST['pantalla'] : '';
            $boton = isset($_POST['boton']) ? $_POST['boton'] : '';

            if ($pantalla_actual === "Error") {
                $pantalla_actual = "";
            }

            if ($boton === 'C') {
                $pantalla = "";
            } elseif ($boton === '=') {
                $expresion = preg_replace('/[^0-9\+\-\*\/\.]/', '', $pantalla_actual);
                if ($expresion !== '') {
                    try {
                        $resultado = @eval("return ($expresion);");
                        $pantalla = ($resultado === false || $resultado === null) ? "Error" : $resultado;
                    } catch (Throwable $e) {
                        $pantalla = "Error";
                    }
                }
            } else {
                $pantalla = $pantalla_actual . $boton;
            }
        }
        ?>

        <form method="POST" action="">
            <input type="text" class="pantalla-calc" value="<?php echo htmlspecialchars($pantalla); ?>" readonly placeholder="0">
            <input type="hidden" name="pantalla" value="<?php echo htmlspecialchars($pantalla); ?>">

            <div class="grid-calculadora">
                <button type="submit" name="boton" value="7">7</button>
                <button type="submit" name="boton" value="8">8</button>
                <button type="submit" name="boton" value="9">9</button>
                <button type="submit" name="boton" value="/" class="btn-operador">/</button>

                <button type="submit" name="boton" value="4">4</button>
                <button type="submit" name="boton" value="5">5</button>
                <button type="submit" name="boton" value="6">6</button>
                <button type="submit" name="boton" value="*" class="btn-operador">*</button>

                <button type="submit" name="boton" value="1">1</button>
                <button type="submit" name="boton" value="2">2</button>
                <button type="submit" name="boton" value="3">3</button>
                <button type="submit" name="boton" value="-" class="btn-operador">-</button>

                <button type="submit" name="boton" value="C" class="btn-limpiar">C</button>
                <button type="submit" name="boton" value="0">0</button>
                <button type="submit" name="boton" value="=" class="btn-igual">=</button>
                <button type="submit" name="boton" value="+" class="btn-operador">+</button>
            </div>
        </form>
    </div>

    <!-- BLOQUE 2: TU CV ABAJO -->
    <div class="contenedor">
        <h1 id="titulo">Walter Efrén López Sáchez</h1>
        <p><strong>Ocupación:</strong> SysAdmin</p>
        <p><strong>Ubicacion:</strong> Guayaquil, Guayas, Ecuador</p>
        <h2>Perfil Profesional</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic accusantium accusamus nobis similique corrupti labore consequatur facere quis, minima quas. Cupiditate dolorem ratione placeat! Maxime vitae debitis id animi libero!</p>
        <h2>Estudios</h2>
        <ul>
            <li>Técnico Eléctrico</li>
            <li>Contador</li>
            <li>TSU en Sistemas y Ciberseguridad</li>
        </ul>
        <h2>Experiencia Profesional</h2>
        <ul>
            <li>Obra Civil</li>
            <li>Contador de Pymes</li>
            <li>Administrador de Sistemas</li>
        </ul>
        <h2>Conocimientos Técnicos</h2>
        <ul>
            <li>Redes Alambricas e Inhalambricas</li>
            <li>Go, Phyton</li>
            <li>MariaDB, PostgresSql</li>
            <li>Ocacle Cloud Plattform (OCI), Google Cloud Plattform (GCP)</li>
        </ul>
        <h2>Contacto</h2>
        <ul>
            <li><strong>Celular: </strong>0961889094</li>
            <li><strong>Correo: </strong> welssoft@gmail.com</li>
        </ul>
    </div>

</body>
</html>