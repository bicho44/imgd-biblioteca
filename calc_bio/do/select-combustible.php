<?php

//include_once 'config.php';

$sql = "SELECT * FROM combustibles;";

$results = $wpdb->get_results($sql);

if ($results) {
  // output data of each row
  $out = "<select id='combustibles'>";

    foreach($results as $result) {
  
    $out .="<option value='" . $result->id. "'>  " . $result->combustible. " </option>";
  }
      $out .= "</select>";

} else {
  echo "0 results";
}

echo $out;

//$conn->close();