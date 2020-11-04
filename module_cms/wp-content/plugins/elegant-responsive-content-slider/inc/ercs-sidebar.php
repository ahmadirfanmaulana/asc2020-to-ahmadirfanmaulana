<?php
/*
 * Elegant Responsive Content Slider 1.0.1
 * By @realwebcare - http://www.realwebcare.com
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
function ercs_sidebar() { ?>
	<div id="ercs-sidebar" class="postbox-container">
		<div id="ercsusage-shortcode" class="ercsusage-sidebar">
			<h3><?php _e('Plugin Shortcode', 'ercs'); ?></h3>
			<div class="ercsshortcode"><input type="text" class="ercs-shortcode" value="[elegant-slider]" /></div>
		</div>
		<div id="ercsusage-info" class="ercsusage-sidebar">
			<h3><?php _e('Plugin Info', 'ercs'); ?></h3>
			<ul class="ercsusage-list">
				<li><?php _e('Version: 1.0.1', 'ercs'); ?></li>
				<li><?php _e('Requires: Wordpress 3.5+', 'ercs'); ?></li>
				<li><?php _e('First release: 25 May, 2017', 'ercs'); ?></li>
				<li><?php _e('Last Update: 27 May, 2017', 'ercs'); ?></li>
				<li><?php _e('By', 'ercs'); ?>: <a href="https://www.realwebcare.com/" target="_blank"><?php _e('Real Web Care', 'ercs'); ?></a></li>
				<li><?php _e('Facebook', 'ercs'); ?>: <a href="https://www.facebook.com/realwebcare" target="_blank"><?php _e('Realwebcare', 'ercs'); ?></a></li>
			</ul>
		</div>
	</div><?php
}
add_action( 'ercs_settings_content', 'ercs_sidebar' );
?>