<?php
/*
Plugin Name: IMGD Biblioteca
Plugin URI: https://github.com/bicho44/imgd-biblioteca
Description: Pequeño plug-in para biblioteca de datos
Version: 1.02
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

?>
