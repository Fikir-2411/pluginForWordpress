<?php 
/**
 * Plugin Name: Form for RAD
 */

 function rd_form_plugin(){

    $content = '';
    $content .= 'Hello World!';


    return $content;
 }
 add_shortcode('rd_form','rd_form_plugin')


?>