<?php
/*
Plugin Name: Plugin Works
Author: Ahmad Irfan Maulana - Indonesia
Version: 1.0
*/

add_action('admin_menu', function () {
	add_menu_page('Plugin Works', 'Plugin Works', 'manage_options', 'pluginworks', 'plugin_work', 'dashicons-store', 2);
});

function plugin_work () {
	?>
		<h1>Plugin Works!</h1>
	<?php
}

?>
