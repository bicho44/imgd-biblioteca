<?php
include_once 'do/form-select.php';

global $wpdb;


function showCalculadora(){

?>
    <script type="text/javascript" src="bio.js"></script>
    <table>
        <tr>
            <td>Tipo de Combustible a reemplazar</td>
            <td>
                <?php
                calc_combustibles();
                ?>
            </td>
        </tr>

        <tr>
            <td>Potencia</td>
            <td>
                <?php
                calc_potencias();
                ?>
            </td>
        </tr>

        <tr>
            <td>Uso de la caldera</td>
            <td>
                <?php
                calc_calderas();
                ?>
            </td>
        </tr>
        <tr>
            <td>Precio de Combustible a reemplazar</td>
            <td>
                <input type="text" id="precio" />
            </td>
        </tr>
        <tr>
            <td>Horas de uso anuales</td>
            <td>
                <input type="text" id="horas" />
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="button" class="primary" value="Siguiente" onclick="goResultados();"/>
            </td>
        </tr>


    </table>

<?php } 

add_shortcode( 'showCalculadora', 'showCalculadora' );

?>