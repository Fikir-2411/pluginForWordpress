<?php 
/**
 * Plugin Name:       Contact Form for RAD
 * Description:       A simple contact form plugin that is used for displaying a contact form 
 * Version:           1.0
 * Author:            Fikir Muluken 
 * Author URI:        https://fikirm.wordpress.com
 * Text Domain:       my-basics-plugin
 */

 defined('ABSPATH') or die("You missed it");

 function rd_contact_plugin(){
    include_once plugin_dir_path(__FILE__) .'includes/the-form.php';

 }

 add_shortcode('rd_form','rd_contact_plugin');


 function rd_form_capture(){
    if (isset($_POST['rd_form_submit'])){
       $name = sanitize_text_field($_POST['name']);
       $email = sanitize_text_field($_POST['email']);
       $message = sanitize_textarea_field($_POST['message']);

       $to = 'fikirmuluken@gmail.com';
       $subject = 'Contact Form Submitted';
       $comment = ''.$name.' - '.$email.' - '.$message;

       wp_mail($to,$subject,$comment);
    }
 }

 add_action('wp_head','rd_form_capture');


function rd_loadAssets(){
   wp_enqueue_style('myCSS', plugin_dir_url(__FILE__) .'assets/css/style.css');
   wp_enqueue_script( 'myScript', plugin_dir_url( __FILE__ ) . 'assets/js/script.js' );
}

add_action('wp_enqueue_scripts','rd_loadAssets');


?>