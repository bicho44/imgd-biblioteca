<?php
include_once 'do/form-selects.php';

function showCalculadora(){

    $form = "<form>";      
    $form .="<label>Tipo de Combustible a reemplazar: ".get_calc_combustibles()."</label>";
    $form .="<label>Potencia: ".get_calc_potencias()."</label>";
    $form .="<label>Uso de la caldera: ".get_calc_calderas()."</label>";
    $form .="<label>Precio de Combustible a reemplazar: <input type='text' id='precio' /></label>";
    $form .="<label>Horas de uso anuales: <input type='text' id='horas' /></label>";
    $form .="<input type='button' class='primary' value='Siguiente' onclick='goResultados();'/>";

    $form .="</form>";
    return $form;
}

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>