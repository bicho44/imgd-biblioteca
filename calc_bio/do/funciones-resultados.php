<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//include_once './config.php';

function getEficiencia($c, $f) {

    global $wpdb;
    
    $sql = 'SELECT '. $c .' FROM eficiencia2 WHERE etiqueta LIKE "%'. $f .'%"';
    echo $sql.'<br />';

    //get_row( string|null $query = null, string $output = OBJECT, int $y )

    $results = $wpdb->get_row($sql, ARRAY_A);

    $r = 0;

    if ( null !== $results ) {
        //var_dump($results);
        $r = $results[$c];
        echo 'Resultado'.$r.'<br />';
      }

    return ($r * 100) . "%";
}

function getK1($c) {
    global $wpdb;
    $sql = "SELECT id FROM combustibles WHERE combustible LIKE '%" . $c . "%';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    $r = 0;

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r = $row["id"];
    } 

    return $r . "";
}

function getK3($c) {

    $sql = "SELECT id FROM uso_caldera WHERE etiqueta = '" . $c . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    $r = 0;

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r = $row["id"];
    }

    return $r;
}

function ahorroEnCombustible($v1, $v2) {
    global $wpdb;
    $sql = "SELECT gasto_anual_en_combustible FROM outputs WHERE ID = '" . $v1 . "';";
    //echo $sql;

    $results = $wpdb->get_row($sql);

    $r1 = 0;

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r1 = $row["gasto_anual_en_combustible"];
    }

    $sql = "SELECT gasto_anual_en_combustible FROM outputs WHERE ID = '" . $v2 . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    $r2 = 0;

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r2 = $row["gasto_anual_en_combustible"];
    }

    return ($r1 - $r2);
}



function rangoCostoInversion($key) {
    global $wpdb;

    $sql = "SELECT rango_de_costos_de_inversion FROM outputs WHERE ID = '" . $key . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    $r = "-";

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r = $row["rango_de_costos_de_inversion"];
    }

    return $r;
}

function recuperacion($key) {
    global $wpdb;

    $sql = "SELECT costo_de_inversion_minimo, costo_de_inversion_maximo FROM outputs WHERE ID = '" . $key . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    $r = '-';

    if ($result) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r = $row["costo_de_inversion_minimo"]."-".$row["costo_de_inversion_maximo"];
    } 

    return $r . "";
}


function reduccion_gei($v1, $v2) {
    global $wpdb;

    $sql = "SELECT reduccion_gei FROM outputs WHERE ID = '" . $v1 . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r1 = $row["reduccion_gei"];
    } else {
        $r1 = "0 results";
    }

    $sql = "SELECT reduccion_gei FROM outputs WHERE ID = '" . $v2 . "';";
    //echo $sql;
    $results = $wpdb->get_row($sql);

    if ($results) {
        // output data of each row
        //$row = $result->fetch_assoc();
        $r2 = $row["reduccion_gei"];
    } else {
        $r2 = "0 results";
    }

    return ($r1 - $r2);
}