<?php


/**
 * Get Calc_Potencias
 * 
 * Obtengo el listado de Potencias para el formulario de consulta
 * 
 * @return string HTML select 
 * 
 */
function get_calc_potencias(){
  global $wpdb;
  $sql = 'SELECT * FROM potencia;';

  $results = $wpdb->get_results($sql);

  $out = _x('No hay datos<br />', 'imgd');

    if ($results) {
      // output data of each row
        $out = '<select id="potencias" class="uk-select" aria-required="true" aria-invalid="false">';
        foreach($results as $result) {
          $out .='<option value="' . $result->id. '">  '. $result->potencia.' </option>';
        }
        $out .= '</select>';
    } 

  return $out;

}

/**
 * Calc_Potencias
 * 
 * Obtengo el listado de Potencias para el formulario de consulta
 * 
 * @return string echo HTML select 
 * 
 */
function calc_potencias(){
  echo get_calc_potencias();
}
//

/**
 * Get Calc_Combustibles
 * 
 * Obtengo el listado de Combustibles para el formulario de consulta
 * 
 * @return string HTML select 
 * 
 */
function get_calc_combustibles(){
  global $wpdb;

  $sql = 'SELECT * FROM combustibles;';

  $results = $wpdb->get_results($sql);

  $out = _x('No hay datos<br />', 'imgd');

    if ($results) {
      // output data of each row
      $out = '<select id="combustibles" class="uk-select" aria-required="true" aria-invalid="false">';

        foreach($results as $result) {
          $out .='<option value="' . $result->id. '">  ' . $result->combustible. ' </option>';
        }
      $out .= '</select>';
  } 
  return $out;
}


/**
 * Calc_Combustibles
 * 
 * Obtengo el listado de Combustibles para el formulario de consulta
 * 
 * @return string echo HTML select 
 * 
 */
function calc_combustibles(){
  echo get_calc_combustibles();
}


/**
 * Get Calc_Calderas
 * 
 * Obtengo el listado de Calderas para el formulario de consulta
 * 
 * @return string HTML select 
 * 
 */
function get_calc_calderas(){

  global $wpdb;

  $sql = "SELECT * FROM uso_caldera;";

  $results = $wpdb->get_results($sql);

  $out = _x('No hay datos<br />', 'imgd');

  if ($results) {
    // output data of each row
    $out = '<select id="calderas" class="uk-select" aria-required="true" aria-invalid="false">';
      foreach($results as $result) {
        $out .="<option value='" . $result->etiqueta. "'>  " . $result->uso. " </option>";
      }
    $out .= "</select>";
  }
  return $out;
}


/**
 * Calc_Calderas
 * 
 * Obtengo el listado de Calderas para el formulario de consulta
 * 
 * @return string echo HTML select 
 * 
 */
function calc_calderas(){
  echo get_calc_calderas();
}
