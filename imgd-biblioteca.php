<?php
/*
Plugin Name: IMGD Biblioteca
Plugin URI: https://github.com/bicho44/imgd-biblioteca
Description: Pequeño plug-in para biblioteca de datos
Version: 1.07
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
            ,'rewrite' => array(
                    'slug' => __('categoria', 'imgd')
                )
            )
    );
    
    return $taxonomies;

}




?>
