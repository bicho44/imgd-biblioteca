<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

//include_once './config.php';

function getEficiencia($c, $f, $conn) {

    $sql = "SELECT " . $c . " FROM eficiencia2 WHERE etiqueta LIKE '%" . $f . "%';";
    
    $results = $wpdb->get_results($sql);

    $r = 0;

    if ($results) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r = $row[$c];
    } 

    return ($r * 100) . "%";
}

function getK1($c, $conn) {

    $sql = "SELECT id FROM combustibles WHERE combustible LIKE '%" . $c . "%';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r = $row["id"];
    } else {
        $r = "0 results";
    }

    return $r . "";
}

function getK3($c, $conn) {

    $sql = "SELECT id FROM uso_caldera WHERE etiqueta = '" . $c . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r = $row["id"];
    } else {
        $r = "0 results";
    }

    return $r . "";
}

function ahorroEnCombustible($v1, $v2, $conn) {
    $sql = "SELECT gasto_anual_en_combustible FROM outputs WHERE ID = '" . $v1 . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r1 = $row["gasto_anual_en_combustible"];
    } else {
        $r1 = "0 results";
    }

    $sql = "SELECT gasto_anual_en_combustible FROM outputs WHERE ID = '" . $v2 . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r2 = $row["gasto_anual_en_combustible"];
    } else {
        $r2 = "0 results";
    }

    return ($r1 - $r2);
}



function rangoCostoInversion($key, $conn) {

    $sql = "SELECT rango_de_costos_de_inversion FROM outputs WHERE ID = '" . $key . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r = $row["rango_de_costos_de_inversion"];
    } else {
        $r = "-";
    }

    return $r . "";
}

function recuperacion($key, $conn) {

    $sql = "SELECT costo_de_inversion_minimo, costo_de_inversion_maximo FROM outputs WHERE ID = '" . $key . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r = $row["costo_de_inversion_minimo"]."-".$row["costo_de_inversion_maximo"];
    } else {
        $r = "-";
    }

    return $r . "";
}


function reduccion_gei($v1, $v2, $conn) {
    $sql = "SELECT reduccion_gei FROM outputs WHERE ID = '" . $v1 . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r1 = $row["reduccion_gei"];
    } else {
        $r1 = "0 results";
    }

    $sql = "SELECT reduccion_gei FROM outputs WHERE ID = '" . $v2 . "';";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $r2 = $row["reduccion_gei"];
    } else {
        $r2 = "0 results";
    }

    return ($r1 - $r2);
}