<?php
/*
Title: Imagenes Personalizada
Post Type: imgd_biblioteca
Description: Estas imágenes van a ser usadas en el SlideShow de cada página. en el caso de haberlos
Order: 3
Context: side
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => '_thumbnail_id' // Use these field to match WordPress featured images.
    ,'scope' => 'post_meta'
    ,'options' => array(
        'title' => __('Imagenes del Libro', 'imgd')
        ,'button' => __('Inserte imagenes', 'imgd')
    )
));