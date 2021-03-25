<?php
include_once 'do/form-selects.php';

function showCalculadora(){

    $form = "<form>";

        $form .="<div><label>Tipo de Combustible a reemplazar: ".get_calc_combustibles()."</label></div>";
        $form .="<div><label>Potencia: ".get_calc_potencias()."</label></div>";
        $form .="<div><label>Uso de la caldera: ".get_calc_calderas()."</label></div>";
        $form .="<div><label>Precio de Combustible a reemplazar: <input type='text' id='precio' /></label></div>";
        $form .="<div><label>Horas de uso anuales: <input type='text' id='horas' /></label></div>";
        $form .="<div><input type='button' class='primary' value='Siguiente' onclick='goResultados();'/></div>";

    $form .="</form>";
    return $form;
}

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>