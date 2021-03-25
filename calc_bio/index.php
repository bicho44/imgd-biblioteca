<?php
include_once 'do/form-selects.php';

function showCalculadora(){

    $form = "<form action='#'>";

        $form .="<div><label for='combustibles'>Tipo de Combustible a reemplazar: ".get_calc_combustibles()."</label></div>";
        $form .="<div><label for='potencias'>Potencia: ".get_calc_potencias()."</label></div>";
        $form .="<div><label for='caldera'>Uso de la caldera: ".get_calc_calderas()."</label></div>";
        $form .="<div><label for='precio'>Precio de Combustible a reemplazar: <input type='text' id='precio' /></label></div>";
        $form .="<div><label for='horas'>Horas de uso anuales: <input type='text' id='horas' /></label></div>";
        $form .="<div><input type='button' class='primary' value='"._x('Calcular','imgd')." onclick='goResultados();'/></div>";

    $form .="</form>";
    return $form;
}

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>