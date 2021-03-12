<?php
/*
Title: Archivo del Libro
Post Type: imgd_biblioteca
Description: Archivo del Libro 
Order: 5
Context: side
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => 'archivo_libro'
    ,'scope' => 'post_meta'
    ,'options' => array(
        'title' => __('Archivo del Libro', 'imgd')
        ,'button' => __('Inserte Archivo', 'imgd')
        ,'save' => 'url'
        ,'basic' => true
    )
));