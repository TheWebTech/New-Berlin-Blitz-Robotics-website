<?php
function mytheme_setup() {

register_nav_menus(
array(
'top_menu' => __( 'Top Menu', 'bootpress' )

)
);

}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');



?>