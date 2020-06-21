<?php
/*
Plugin Name: FirstPlugins
Description: Juste une extension de wordpress Simple avec 2 sous menus : un pour les informations générale du plugin et un pour les settings.
Version: 1.0
Author: Yassine Cherkoaui & abdrahim
Author URI: www.yassine&abdrahim.ma
License: GPLv2 or later
Text Domain: Yassine&abderahim
*/
?>

<?php

add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
    
	 //parameters details    
	 //add a new setting page udner setting menu
     add_management_page('Description', 'Description', 'manage_options',__FILE__,'Description_admin_page');
     //add new menu and its sub menu 
    add_menu_page('Description title', 'HOME', 'manage_options','Description_page', 'Description_admin_page');
    add_submenu_page( 'Description_page', 'Page title', 'Settings','manage_options', 'Settings', 'mt_settings_page');
   
    
}


function Description_admin_page () {
  echo '<div class="wrap">
  <h1>Hello!</h1>
  <p>this a simple plugin for showing the description of the plugin and and you can apply changes to it in the database.
  </p>
</div>';
}

// mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {
    echo "<h2>" . __( 'Settings Configurations', 'menu-test' ) . "</h2>";
	include_once('page-sitting.php');
}

?>
