<?php
include_once 'do/form-selects.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

function fshowCalculadora($atts) {
        // echo "Array de atributos: <br />";        
        // print_r($atts);

        // normalize attribute keys, lowercase
        $atts = array_change_key_case( (array) $atts, CASE_LOWER );

        //echo "Atribots desde el shortcode: ".$atts[0]."<br />";

        // override default attributes with user attributes
        $calc_atts = shortcode_atts(
            array(
                'url' => 'resultados',
            ), $atts);

        // echo "Atributos puros: ".$atts['url']."<br />";

        // echo "Calc Atributos: ";
        // print_r($calc_atts);

        $urlResultados = home_url($path = '/').trim($calc_atts["url"]);
    // Bio JS
    //wp_register_script('img_calc_bio', plugin_dir_url( __FILE__ ).'bio.js', false, null, false);

    $form ='<script type="text/javascript" src="'.plugin_dir_url( __FILE__ )."bio.js".'"></script>';

    $form .= '<form action="" method="get" class="wpcf7-form">';

        
         $form .='<label for="combustibles" class="uk-form-label">Tipo de Combustible a reemplazar: </label>
         <div class="uk-margin-small">'
            .get_calc_combustibles().
        '</div>';
        
       /* $form .='<label for="combustibles"> Tipo de Combustible a reemplazar: <br />
        <span class="wpcf7-form-control-wrap">'
            .get_calc_combustibles().
            '</span></label>';*/

        $form .='<label for="potencias" class="uk-form-label">Potencia: </label>
             <div class="uk-margin-small">'
            .get_calc_potencias().
            '</div>';


        $form .='<label for="caldera" class="uk-form-label">Uso de la caldera:</label>
                <div class="uk-margin-small">'
                .get_calc_calderas().
                '</div>';


        $form .='<label for="precio" class="uk-form-label">Precio de Combustible a reemplazar:</label>
                    <div class="uk-margin-small">
                        <input type="text" id="precio" class="uk-input" aria-required="true" aria-invalid="false"/>
                    </div>';

        $form .='<label for="horas" class="uk-form-label">Horas de uso anuales:</label>
                 <div class="uk-margin-small"> 
                <input type="text" id="horas" class="uk-input" />
                </div>';

        $form .='<input type="button" class="uk-button uk-button-primary" value="'._x('Calcular la BioMasa','imgd').'" onclick="goResultados(\''.$urlResultados.'\');"/>';

    $form .='</form>';

    return $form;
}

add_shortcode( 'showCalculadora', 'fshowCalculadora' );

?>
