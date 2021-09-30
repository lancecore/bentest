<?php
if (!defined('ABSPATH')) {
  exit;
}
require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/navbar.php';

add_action('acf/save_post', 'my_acf_save_post');
function my_acf_save_post( $post_id ) {

    // Get newly saved values.
    $values = get_fields( $post_id );

    // Check the new value of a specific field.
    $assigned = get_field('assigned', $post_id);
    if( $assigned ) {
      foreach( $assigned as $user ):
        $to = $user[user_email];
        $subject = "Lead up date";
        $message = "You have been assigned to a lead";
        $headers = "test";
        wp_mail( $to, $subject, $message, $headers );
      endforeach;

    }
}