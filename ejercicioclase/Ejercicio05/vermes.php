<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generador de calendarios</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Crear dos columnas que flotan una al lado de la otra */
        .column {
            float: left;
            padding: 10px;
            height: 200px;
        }

        /* Limpiar los flotados */
        .fila:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Estilos de la tabla */
        table {
            border-collapse: collapse;
            text-align: center;
        }

        td {
            padding: 8px 12px;
        }
    </style>
</head>

<body>
    <div class="fila">
        <!-- Columna izquierda: Formulario -->
        <div class="column">
            <form name="f2" method="post" action="">
                <label for="mes">Mes: </label>
                <select name="mes" id="mes">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>

                <br><br>

                <label for="año">Año: </label>
                <select name="año" id="año">
                    <?php
                        // Generación automática de años desde 1980 hasta el año actual
                       $añoactual= date("Y");
                       for($año = 1980; $año <= $añoactual; $año++){
                        echo "<option value='$año'>$año</option>";
                       }
                    ?>
                    
                </select> 
                
                <br><br>
                <input type="submit" value="Enviar" />
            </form>
        </div>

        <!-- Columna derecha: Calendario generado en PHP -->
        <div class="column">
            <?php
                // 1. Comprobar si el método es POST (si no, salir o no procesar).
                if ($_SERVER[""] == "POST"){
                exit();
                }
                // 2. Recoger el mes y el año en variables.
                $año=(int)$_POST["año"];
                $mes=(int)$_POST["mes"];
                // 3. Obtener el primer día del mes (1 para Lunes ... 7 para Domingo) usando date() y mktime().
                $diauno=date("w",mktime(0,0,0,$mes,1,$año));
                if($diauno==0){
                $diauno==7;
                }
                $numdias=date("t", mktime(0, 0, 0, $mes, 1, $año));
                $meses= array(1 => "Enero",
				"Febrero",
				"Marzo",
				"Abril",
				"Mayo",
				"Junio",
				"Julio",
				"Agosto",
				"Septiembre",
				"Octubre",
				"Noviembre",
				"Diciembre"
			);
            echo " Primer día del mes es día = $diauno <br>";
			echo " El mes tiene $numdias días ";
            ?>
            <table border="1">
				<tr>
					<td colspan="7"> <?php echo $meses[$mes] ?> del <?php echo $año ?></td>
				</tr>
				<tr>
					<td>L</td>
					<td>M</td>
					<td>X</td>
					<td>J</td>
					<td>V</td>
					<td>S</td>
					<td>D</td>
				</tr>
				<tr>
                    <?php
					$ndias = 0;
					$totalcasillas = calcularCasillas($diauno, $numdias);

					for ($ncasillas = 1; $ncasillas <= $totalcasillas; $ncasillas++) {
						// Casilla con número de día
						if ($diauno <= $ncasillas && $ndias < $numdias) {
							$ndias++;
							// Festivo
							if ($ncasillas % 7 == 6 || $ncasillas % 7 == 0) {
								echo "<td style=color:red> $ndias </td>";
							} else {
								echo "<td> $ndias </td>";
							}
						} else {
							// Casilla en blanco
							echo "<td></td> ";
						}
						if ($ncasillas % 7 == 0 && $ncasillas < $totalcasillas) {
							echo "</tr><tr>";
						}
					}
					?>

                </tr>
            </table>
        </div>
    </div>
</body>

</html>
<?php
function calcularCasillas($primerdia, $numerodias)
{
	$total = $primerdia - 1 + $numerodias;
	if ($total == 28) return 28;
	if ($total <= 35) return 35;
	else return 42;
}
?>