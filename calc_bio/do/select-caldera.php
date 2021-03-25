<?php

//include_once 'config.php';

$sql = "SELECT * FROM uso_caldera;";

$results = $wpdb->get_results($sql);

if ($results) {
  // output data of each row
  $out = "<select id='calderas'>";

    foreach($results as $result) {
  
    $out .="<option value='" . $result->etiqueta. "'>  " . $result->uso. " </option>";
  }
      $out .= "</select>";

} else {
  echo "0 results";
}

echo $out;


//$conn->close();