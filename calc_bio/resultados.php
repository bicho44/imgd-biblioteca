<?php
// include_once './config.php';
 include_once 'do/funciones-resultados.php';
/**
* fDisplayResultados
*
* @return Tabla de resultados de la búsqueda realizada por la calculadora de Biomasa.
*
* @todo agregar opción de clases CSS para formato de tabla y otros
* @todo poner las opciones de traducción a todos lo textos.
* @todo ver de que manera usar $_POST en lugar de $_GET, por una cuestión de seguridad.
*/
function fdisplayResultados (){
    if($_GET['tipo']!=""){
    $resultados = '
<input type="button" value="Regresar" onclick="  window.history.back();" />';

$resultados .='
<h3>TECNOLOGIA ACTUAL</h3>
  
<table class="uk-table uk-table-divider uk-table-hover uk-table-small">
<tbody>
    <tr>
        <td>Tipo de Combustible a reemplazar</td>
        <td>
            <input type="hidden" id="tipo" value="'. $_GET["tipo"] .'" />';

    $resultados .=  $_GET["tipo_text"];
    $resultados .='</td>
    </tr>
    <tr>
        <td>Potencia</td>
        <td>
            <input type="hidden" id="potencia" value="'. $_GET["potencia"] .'" />';

    $resultados .= $_GET["potencia_text"];

    $resultados .='
        </td>
    </tr>
    <tr>
        <td>Uso de la caldera</td>
        <td><input type="hidden" id="caldera" value="'.$_GET["caldera"].'" />';
        
        $resultados .= $_GET["caldera_text"];
        
        $resultados .='</td>
    </tr>
    <tr>
        <td>'.__("Precio de Combustible a reemplazar","imgd").'</td>
        <td>
            <input type="hidden" id="precio" value="'.$_GET["precio"].'" />';

            $resultados .=$_GET["precio"];

            if ($_GET["precio"] != "") {
                $resultados .= __(" CLP/lt sin IVA","imgd");
            }
            $resultados .='     
        </td>
    </tr>
    <tr>
        <td>'.__("Horas de Uso","imgd").'</td>
        <td>
            <input type="hidden" id="horas" value="'.$_GET["horas"].'" />';
            $resultados .= $_GET["horas"];
            $resultados .='</td>
    </tr>
    </tbody>
</table>


<h3>'.__("CUADRO COMPARATIVO","imgd").'</h3>

<table class="uk-table uk-table-divider uk-table-hover uk-table-small">
            <thead>
    <tr>
        <th>'.__("Combustible","imgd").'</th>
        <th> '.$_GET["tipo_text"].'</th>
        <th> '.__("Pellet","imgd").'</th>
        <th> '.__("Astilla a Seca < 25%","imgd").'</th>
        <th> '.__("Astilla húmeda > 25%","imgd").'</th>
        <th> '.__("Biomasa triturada","imgd").'</th>
    </tr>   
    </thead>
    <tbody>
    <tr>
        <td> '.__("Potencia","imgd").'</td>
        <td>'.$_GET["potencia_text"].'</td>
        <td>'.$_GET["potencia_text"].'</td>
        <td>'.$_GET["potencia_text"].'</td>
        <td>'.$_GET["potencia_text"].'</td>
        <td>'.$_GET["potencia_text"].'</td>
    </tr>    
    <tr>
        <td> '.__("Caldera","imgd").'</td>
        <td>'.$_GET["caldera_text"].'</td>
        <td>'.$_GET["caldera_text"].'</td>
        <td>'.$_GET["caldera_text"].'</td>
        <td>'.$_GET["caldera_text"].'</td>
        <td>'.$_GET["caldera_text"].'</td>
    </tr>    
    <tr>
        <td> '.__("Eficiencia","imgd").'</td>
        <td>'.getEficiencia($_GET["caldera"], $_GET["tipo_text"]).'</td>
        <td>'.getEficiencia($_GET["caldera"], __("Pellet","imgd")).'</td>
        <td>'.getEficiencia($_GET["caldera"], __("Astilla Seca","imgd")).'</td>
        <td>'.getEficiencia($_GET["caldera"], __("Astilla h","imgd")).'</td>
        <td>'.getEficiencia($_GET["caldera"], __("Biomasa triturada","imgd")).'</td>
    </tr>    
    <tr>
        <td> '.__("Ahorro en Combustible (CLP/año)","imgd").'</td>
        <td>'.
            $k1 = getK1($_GET["tipo_text"]);
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"]);
            $valor1 = $k1 . $k2 . $k3;
            $resultados .= $valor1;
            $resultados .='</td>
        <td>';
            $k1 = getK1("Pellet");
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"]);
            $valor2 = "10" . $k2 . $k3;
            $aec2 = 0;
            if (ahorroEnCombustible($valor1, $valor2) < 0) {
                $resultados .=__("NO APLICA","imgd");
                $aec2 = -1;
            } else {
                $resultados .=ahorroEnCombustible($valor1, $valor2);
            }
        
            $resultados .='</td>
        <td>';
            $k1 = getK1("Astilla seca");
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"]);
            $valor3 = "11" . $k2 . $k3;
            $aec3 = 0;

            if (ahorroEnCombustible($valor1, $valor2) < 0) {
                $resultados .=__("NO APLICA","imgd");
                $aec3 = -1;
            } else {
                $resultados .=ahorroEnCombustible($valor1, $valor2);
            }
            $resultados .='
        </td>
        <td>';
            
            $k1 = getK1("Astilla h");
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"]);
            $valor4 = "12" . $k2 . $k3;
            $aec4 = 0;

            if (ahorroEnCombustible($valor1, $valor2) < 0) {
                $resultados .= __("NO APLICA","imgd");
                $aec4 = -1;
            } else {
                $resultados .=ahorroEnCombustible($valor1, $valor2);
            }
            $resultados .='
        </td>
        <td>';
            $k1 = getK1("Biomasa triturada");
            $k2 = $_GET["potencia"];
            $k3 = getK3($_GET["caldera"]);
            $valor5 = "13" . $k2 . $k3;
            $aec5 = 0;

            if (ahorroEnCombustible($valor1, $valor2) < 0) {
                $resultados .= __("NO APLICA","imgd");
                $aec5 = -1;
            } else {
                $resultados .= ahorroEnCombustible($valor1, $valor2);
            }
            $resultados .='
        </td>
    </tr>   


    <tr>
        <td> Rango de Costos de Inversión (CLP)</td>
        <td> </td>
        <td>'. rangoCostoInversion($valor2); 
        $resultados .='</td>
        <td>'.rangoCostoInversion($valor3);
        $resultados .='</td>
        <td>'.rangoCostoInversion($valor4); 
        $resultados .='</td>
        <td>'.rangoCostoInversion($valor5);
        $resultados .='</td>
    </tr> 


    <tr>
        <td> Período de recuperación de la Inversión (años)</td>
        <td> </td>
        <td> ';

            if($aec2 != -1){
               $resultados .=  recuperacion($valor2);
            }else{
                $resultados .=__("NO APLICA","imgd");
            }
            $resultados .='
        </td>
        
        <td> ';
        
            if($aec3 != -1){
                $resultados .=  recuperacion($valor3);
            }else{
                $resultados .= __("NO APLICA","imgd");
            }
            $resultados .='
        </td>
        
        <td> ';
        
            if($aec4 != -1){
                $resultados .= recuperacion($valor4);
            } else {
                $resultados .= __("NO APLICA","imgd");
            }
            $resultados .='</td>
        
        <td> ';
            if($aec5 != -1){
                $resultados .=  recuperacion($valor5);
            }else{
                $resultados .= __("NO APLICA","imgd");
            }
            $resultados .='
        </td>
    </tr>
    <tr>
        <td> Reducción anual de Gases de Efecto Invernadero (t CO2eq/año)</td>
        <td> </td>
        <td>';
            if(reduccion_gei($valor1, $valor2) < 0){
                $resultados .=__("NO APLICA","imgd");
            } else {
                $resultados .= reduccion_gei($valor1, $valor2);
            }
            $resultados .='
        </td>
        <td>';
            if(reduccion_gei($valor1, $valor3) < 0){
                $resultados .= "NO APLICA";
            }
            else{
                $resultados .= reduccion_gei($valor1, $valor3);
            }
            $resultados .='
        </td>
        <td>';
            if(reduccion_gei($valor1, $valor4) < 0){
                $resultados .= __("NO APLICA","imgd");
            }
            else{
                $resultados .= reduccion_gei($valor1, $valor4);
            }
            $resultados .='
        </td>
        <td>';
            if(reduccion_gei($valor1, $valor5) < 0){
                $resultados .= __("NO APLICA","imgd");
            } else {
                $resultados .= reduccion_gei($valor1, $valor5);
            }
            $resultados .='
        </td>
    </tr> 
    </tbody>
</table>';
        } else {
            $resultados = "<h1>".__("No se puede acceder a los resultados sin antes hacer una consulta.","imgd")."</h1>" ;
            $resultados .= "<p>".__("Por favor diríjase a la Calculadora de Biomasa en el Menú de Proyectos","imgd")."</p>" ;
        }


return $resultados;

} // end displayResultados

add_shortcode( 'displayResultados', 'fdisplayResultados' );
