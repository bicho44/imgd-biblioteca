<?php
/*
Plugin Name: IMGD Biblioteca
Plugin URI: https://github.com/bicho44/imgd-biblioteca
Description: Pequeño plug-in para biblioteca de datos
Version: 1.15
Author: Federico Reinoso
Author URI: https://imgdigital.com.ar
Plugin Type: Piklist
License: GPL2
*/

//Check Piklist
add_action('init', 'my_init_function');
function my_init_function(){
  if(is_admin()){
   include_once('parts/class-piklist-checker.php');
 
   if (!piklist_checker::check(__FILE__)){
     return;
   }
  }
}

/**
 * Definir El Custom Post Type
 *
 * @name: Biblioteca
 * @dependencies: Piklist
 */
add_filter('piklist_post_types', 'biblioteca_post_type');

function biblioteca_post_type($post_types)
{
    $singular = 'Libro';
    $plural = 'Bibliografía';

    $post_types['imgd_biblioteca'] = array(
        'labels' => array(
                'name'               => _x( $plural, 'post type general name', 'imgd' ),
                'singular_name'      => _x( $singular, 'post type singular name', 'imgd' ),
                'menu_name'          => _x( $plural, 'admin menu', 'imgd' ),
                'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'imgd' ),
                'add_new'            => _x( 'Agregue un '.$singular, 'imgd' ),
                'add_new_item'       => __( 'Agregue un nuevo '.$singular, 'imgd' ),
                'new_item'           => __( 'Nuevo '.$singular, 'imgd' ),
                'edit_item'          => __( 'Edite el '.$singular, 'imgd' ),
                'view_item'          => __( 'Ver el '.$singular, 'imgd' ),
                'all_items'          => __( 'Toda la '.$plural, 'imgd' ),
                'search_items'       => __( 'Buscar en la '.$plural, 'imgd' ),
                'parent_item_colon'  => __( $singular.' Pariente:', 'imgd' ),
                'not_found'          => __( 'No se encontró el '.$singular, 'imgd' ),
                'not_found_in_trash' => __( 'No se encontró el '.$singular.' en la Basura.', 'imgd' )
            )
        ,'type' => 'page'
        ,'title' => __('Ingrese un nuevo '.$singular, 'imgd')
        ,'public' => true
        ,'capability_type' => 'post'
        ,'has_archive' => __('biblioteca','imgd')
        ,'menu_icon' => 'dashicons-book'
        ,'page_icon' => 'dashicons-book-alt'
        ,'show_in_rest' => true
        ,'rest_base' => 'biblioteca'
        ,'rewrite' => array(
            'slug' => __('libro', 'imgd')
        )
    ,'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail'
        )
    ,'menu_position'=>20
    ,'edit_columns' => array(
            'title' => __($singular, 'imgd')
        )
    ,'hide_meta_box' => array(
            'slug'
            ,'author'
            ,'revisions'
            ,'comments'
            ,'mymetabox_revslider_0' // Rev Slider Metabox
            ,'postimagediv' //Feature Image div
            ,'commentstatus'
        )
    );
    return $post_types;
}


/**
 * Definir Taxonomía del Custom Post Type
 *
 * @name: IMGD Categoria del Libro
 * @dependencies: Piklist
 */

add_filter('piklist_taxonomies', 'libro_categoria');

function libro_categoria($taxonomies)
{
    $taxonomies[] = array(
        'post_type' => 'imgd_biblioteca'
        ,'name' => 'imgd_libro_categoria'
        ,'show_admin_column' => true
        ,'configuration' => array(
            'hierarchical' => false
            ,'labels' => piklist('taxonomy_labels', __('Categoría del Libro', 'imgd'))
            ,'hide_meta_box' => false
            ,'show_ui' => true
            ,'query_var' => true
            ,'show_in_rest' => true
            ,'rest_base' => 'libro_categoria'
            ,'rewrite' => array(
                    'slug' => __('cat-libro', 'imgd')
                )
            )
    );
    
    return $taxonomies;

}

/**
 * ShortCode: Show Book
 * @param number $postID ID del Post
 * @return string HTML con el link del Archivo del Libro, tiene una clase btn, para formato
 * 
 * @Todo: Agregar algún parámetro para poder incluir dinámicamente las clases del link retornado.
 */
function show_book($postID) {
  $book = "";

  if (!$postID) {
    $postID = get_the_ID();
  }

  $urldelArchivo = get_post_meta($postID, 'archivo_libro');

  //piklist::pre($urldelArchivo);

  if (!empty($urldelArchivo[0])) {
    $book  ='<a href="'.$urldelArchivo[0].'" class="el-content uk-button uk-button-default" >';
    $book .='Descargar Archivo ';

    $book .= '<svg width="35" height="35" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <rect fill="none" stroke="#E93A4B" width="13" height="17" x="3.5" y="1.5"></rect>
    <path d="M14.65 11.67c-.48.3-1.37-.19-1.79-.37a4.65 4.65 0 0 1 1.49.06c.35.1.36.28.3.31zm-6.3.06l.43-.79a14.7 14.7 0 0 0 .75-1.64 5.48 5.48 0 0 0 1.25 1.55l.2.15a16.36 16.36 0 0 0-2.63.73zM9.5 5.32c.2 0 .32.5.32.97a1.99 1.99 0 0 1-.23 1.04 5.05 5.05 0 0 1-.17-1.3s0-.71.08-.71zm-3.9 9a4.35 4.35 0 0 1 1.21-1.46l.24-.22a4.35 4.35 0 0 1-1.46 1.68zm9.23-3.3a2.05 2.05 0 0 0-1.32-.3 11.07 11.07 0 0 0-1.58.11 4.09 4.09 0 0 1-.74-.5 5.39 5.39 0 0 1-1.32-2.06 10.37 10.37 0 0 0 .28-2.62 1.83 1.83 0 0 0-.07-.25.57.57 0 0 0-.52-.4H9.4a.59.59 0 0 0-.6.38 6.95 6.95 0 0 0 .37 3.14c-.26.63-1 2.12-1 2.12-.3.58-.57 1.08-.82 1.5l-.8.44A3.11 3.11 0 0 0 5 14.16a.39.39 0 0 0 .15.42l.24.13c1.15.56 2.28-1.74 2.66-2.42a23.1 23.1 0 0 1 3.59-.85 4.56 4.56 0 0 0 2.91.8.5.5 0 0 0 .3-.21 1.1 1.1 0 0 0 .12-.75.84.84 0 0 0-.14-.25z">
    </path>
    </svg>';

    $book .="</a>";
  }

  return $book;
}
add_shortcode( 'showBook', 'show_book' );

?>
