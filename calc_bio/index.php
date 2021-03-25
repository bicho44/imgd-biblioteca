<?php
include_once 'do/form-selects.php';

function showCalculadora(){

    $form = '<form action="#" class="wpcf7-form init">';

        $form .='<label for="combustibles">
        Tipo de Combustible a reemplazar:
        <span class="wpcf7-form-control-wrap">'
            .get_calc_combustibles().
            '</span></label>';

        $form .='<label for="potencias">Potencia: 
            <span class="wpcf7-form-control-wrap">'
            .get_calc_potencias().
            '</span></label>';


        $form .='<label for="caldera">Uso de la caldera: 
                <span class="wpcf7-form-control-wrap">'
                .get_calc_calderas().
                '</span>
            </label>';


        $form .='<label for="precio">Precio de Combustible a reemplazar:
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" id="precio" class="wpcf7-form-control wpcf7-select" aria-required="true" aria-invalid="false"/>
                    </span>
                </label>';

        $form .='<label for="horas">Horas de uso anuales:
                <span class="wpcf7-form-control-wrap"> 
                <input type="text" id="horas" />
                </span></label>';

        $form .='<input type="button" class="wpcf7-form-control wpcf7-submit" value="'._x('Calcular','imgd').'" onclick="goResultados();"/>';

    $form .='</form>';
    
    return $form;
}

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>