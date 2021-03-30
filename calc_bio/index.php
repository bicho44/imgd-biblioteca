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

        
         $form .='<label class="uk-form-label">Tipo de Combustible a reemplazar: </label>
         <div class="uk-margin-small">'
            .get_calc_combustibles().
        '</div>';
        
       /* $form .='<label for="combustibles"> Tipo de Combustible a reemplazar: <br />
        <span class="wpcf7-form-control-wrap">'
            .get_calc_combustibles().
            '</span></label>';*/

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

        $form .='<input type="button" class="wpcf7-form-control wpcf7-submit" value="'._x('Calcular la BioMasa','imgd').'" onclick="goResultados(\''.$urlResultados.'\');"/>';

    $form .='</form>';

    return $form;
}

add_shortcode( 'showCalculadora', 'fshowCalculadora' );

?>
