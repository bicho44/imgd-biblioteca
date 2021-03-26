<?php
include_once 'do/form-selects.php';

function showCalculadora(){

    // Bio JS
    wp_register_script('img_calc_bio', plugin_dir_url( __FILE__ ).'calc_bio/bio.js', false, null, false);

    $form ='<script type="text/javascript" src="'.plugin_dir_url( __FILE__ ).'calc_bio/bio.js'.'"></script>';

    $form .= '<form action="" method="get" class="wpcf7-form init">';

        $form .='<label for="combustibles"> Tipo de Combustible a reemplazar: <br />
        <span class="wpcf7-form-control-wrap">'
            .get_calc_combustibles().
            '</span></label>';

        $form .='<label for="potencias">Potencia: <br />
            <span class="wpcf7-form-control-wrap">'
            .get_calc_potencias().
            '</span></label>';


        $form .='<label for="caldera">Uso de la caldera:<br />
                <span class="wpcf7-form-control-wrap">'
                .get_calc_calderas().
                '</span>
            </label>';


        $form .='<label for="precio">Precio de Combustible a reemplazar:<br />
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" id="precio" class="wpcf7-form-control wpcf7-text" aria-required="true" aria-invalid="false"/>
                    </span>
                </label>';

        $form .='<label for="horas">Horas de uso anuales:<br />
                <span class="wpcf7-form-control-wrap"> 
                <input type="text" id="horas" class="wpcf7-form-control wpcf7-text"/>
                </span></label>';

        $form .='<input type="button" class="wpcf7-form-control wpcf7-submit" value="'._x('Calcular','imgd').'" onclick="goResultados();"/>';

    $form .='</form>';

    return $form;
}

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>