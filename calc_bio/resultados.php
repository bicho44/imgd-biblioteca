<?php
include_once './config.php';
include_once './func.php';
?>
<input type="button" value="Regresar" onclick="  window.history.back();" />

<h2>TECNOLOGIA ACTUAL</h2>
  
<table border="1">
    <tr>
        <td>Tipo de Combustible a reemplazar</td>
        <td>
            <input type="hidden" id="tipo" value="<?php echo $_GET["tipo"]; ?>" />
            <?php echo $_GET["tipo_text"]; ?>
        </td>
    </tr>
    <tr>
        <td>Potencia</td>
        <td>
            <input type="hidden" id="potencia" value="<?php echo $_GET["potencia"]; ?>" />
            <?php echo $_GET["potencia_text"]; ?>
        </td>
    </tr>
    <tr>
        <td>Uso de la caldera</td>
        <td><input type="hidden" id="caldera" value="<?php echo $_GET["caldera"]; ?>" />
            <?php echo $_GET["caldera_text"]; ?></td>
    </tr>
    <tr>
        <td>Precio de Combustible a reemplazar</td>
        <td>
            <input type="hidden" id="precio" value="<?php echo $_GET["precio"]; ?>" />
            <?php
            echo $_GET["precio"];
            if ($_GET["precio"] != "") {
                echo "CLP/lt sin IVA";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Horas de uso</td>
        <td>
            <input type="hidden" id="horas" value="<?php echo $_GET["horas"]; ?>" />
            <?php echo $_GET["horas"]; ?>
        </td>
    </tr>
</table>


<h2>
    CUADRO COMPARATIVO </h2>

<table border="1">
    <tr>
        <td> <b>Combustible</b></td>
        <td> <?php echo $_GET["tipo_text"]; ?></td>
        <td> Pellet</td>
        <td> Astilla seca < 25%</td>
        <td> Astilla húmeda > 25%</td>
        <td> Biomasa triturada</td>
    </tr>    
    <tr>
        <td> <b>Potencia</b></td>
        <td> <?php echo $_GET["potencia_text"]; ?></td>
        <td> <?php echo $_GET["potencia_text"]; ?></td>
        <td> <?php echo $_GET["potencia_text"]; ?></td>
        <td> <?php echo $_GET["potencia_text"]; ?></td>
        <td> <?php echo $_GET["potencia_text"]; ?></td>
    </tr>    
    <tr>
        <td> <b>Caldera</b></td>
        <td> <?php echo $_GET["caldera_text"]; ?></td>
        <td> <?php echo $_GET["caldera_text"]; ?></td>
        <td> <?php echo $_GET["caldera_text"]; ?></td>
        <td> <?php echo $_GET["caldera_text"]; ?></td>
        <td> <?php echo $_GET["caldera_text"]; ?></td>
    </tr>    
    <tr>
        <td> <b>Eficiencia</b></td>
        <td> <?php echo getEficiencia($_GET["caldera"], $_GET["tipo_text"], $conn); ?></td>
        <td> <?php echo getEficiencia($_GET["caldera"], "Pellet", $conn); ?></td>
        <td> <?php echo getEficiencia($_GET["caldera"], "Astilla seca", $conn); ?></td>
        <td> <?php echo getEficiencia($_GET["caldera"], "Astilla h", $conn); ?></td>
        <td> <?php echo getEficiencia($_GET["caldera"], "Biomasa triturada", $conn); ?></td>
    </tr>    
    <tr>
        <td> <b>Ahorro en Combustible (CLP/año)</b></td>
        <td>
            <?php
            $k1 = getK1($_GET["tipo_text"], $conn);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"], $conn);
            $valor1 = $k1 . $k2 . $k3;
            //  echo $valor1;
            ?>
        </td>
        <td>
            <?php
            $k1 = getK1("Pellet", $conn);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"], $conn);
            $valor2 = "10" . $k2 . $k3;
            $aec2 = 0;
            if (ahorroEnCombustible($valor1, $valor2, $conn) < 0) {
                echo "NO APLICA";
                $aec2 = -1;
            } else {
                ahorroEnCombustible($valor1, $valor2, $conn);
            }
            ?>

        </td>
        <td>
            <?php
            $k1 = getK1("Astilla seca", $conn);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"], $conn);
            $valor3 = "11" . $k2 . $k3;
            $aec3 = 0;

            if (ahorroEnCombustible($valor1, $valor2, $conn) < 0) {
                echo "NO APLICA";
                $aec3 = -1;
            } else {
                ahorroEnCombustible($valor1, $valor2, $conn);
            }
            ?>
        </td>
        <td> 
            <?php
            $k1 = getK1("Astilla h", $conn);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"], $conn);
            $valor4 = "12" . $k2 . $k3;
            $aec4 = 0;

            if (ahorroEnCombustible($valor1, $valor2, $conn) < 0) {
                echo "NO APLICA";
                $aec4 = -1;
            } else {
                ahorroEnCombustible($valor1, $valor2, $conn);
            }
            ?>
        </td>
        <td> 
            <?php
            $k1 = getK1("Biomasa triturada", $conn);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"], $conn);
            $valor5 = "13" . $k2 . $k3;
            $aec5 = 0;

            if (ahorroEnCombustible($valor1, $valor2, $conn) < 0) {
                echo "NO APLICA";
                $aec5 = -1;
            } else {
                ahorroEnCombustible($valor1, $valor2, $conn);
            }
            ?>
        </td>
    </tr>   


    <tr>
        <td> <b>Rango de Costos de Inversión (CLP)</b></td>
        <td> </td>
        <td> <?php echo rangoCostoInversion($valor2, $conn); ?></td>
        <td> <?php echo rangoCostoInversion($valor3, $conn); ?></td>
        <td> <?php echo rangoCostoInversion($valor4, $conn); ?></td>
        <td> <?php echo rangoCostoInversion($valor5, $conn); ?></td>
    </tr> 


    <tr>
        <td> <b>Período de recuperación de la Inversión (años)</b></td>
        <td> </td>
        <td> 
            <?php 
            if($aec2 != -1){
               echo  recuperacion($valor2, $conn);
            }else{
                echo "NO APLICA";
            }
            ?>
        </td>
        
        <td> 
            <?php 
            if($aec3 != -1){
               echo  recuperacion($valor3, $conn);
            }else{
                echo "NO APLICA";
            }
            ?>
        </td>
        
        <td> 
            <?php 
            if($aec4 != -1){
               echo  recuperacion($valor4, $conn);
            }else{
                echo "NO APLICA";
            }
            ?>
        </td>
        
        <td> 
            <?php 
            if($aec5 != -1){
               echo  recuperacion($valor5, $conn);
            }else{
                echo "NO APLICA";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td> <b>Reducción anual de Gases de Efecto Invernadero (t CO2eq/año)</b></td>
        <td> </td>
        <td>
            <?php 
            if(reduccion_gei($valor1, $valor2, $conn) < 0){
                echo "NO APLICA";
            }
            else{
                echo reduccion_gei($valor1, $valor2, $conn);
            }
            ?>
        </td>
        <td>
            <?php 
            if(reduccion_gei($valor1, $valor3, $conn) < 0){
                echo "NO APLICA";
            }
            else{
                echo reduccion_gei($valor1, $valor3, $conn);
            }
            ?>
        </td>
        <td>
            <?php 
            if(reduccion_gei($valor1, $valor4, $conn) < 0){
                echo "NO APLICA";
            }
            else{
                echo reduccion_gei($valor1, $valor4, $conn);
            }
            ?>
        </td>
        <td>
            <?php 
            if(reduccion_gei($valor1, $valor5, $conn) < 0){
                echo "NO APLICA";
            }
            else{
                echo reduccion_gei($valor1, $valor5, $conn);
            }
            ?>
        </td>
    </tr> 
</table>
