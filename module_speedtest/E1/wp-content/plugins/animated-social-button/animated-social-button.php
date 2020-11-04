<?php
/*
Plugin Name: Animated Social Button
Author: Ahmad Irfan Maulana - Indonesia
Version: 1.0
*/

class AnimatedSocialButton {
    function __construct () {
        add_action('wp_enqueue_scripts', array($this, 'resources'));
        add_shortcode('animated-social-button', array($this, 'setup'));
    }

    public function resources () {
        wp_enqueue_style('animated-social-fontawesome', plugin_dir_url(__FILE__) . 'fontawesome/css/all.css');
        wp_enqueue_style('animated-social-style', plugin_dir_url(__FILE__) . 'style.css');
    }

    public function setup () {
        ob_start();
        ?>
            <div class="animated-social-button">

                <div class="icon-button">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="icon-button">
                    <i class="fab fa-pinterest"></i>
                </div>
                <div class="icon-button">
                    <i class="fab fa-twitter"></i>
                </div>
                <div class="icon-button">
                    <i class="fab fa-tumblr"></i>
                </div>

            </div>
        <?php
        return ob_get_clean();
    }
}

$animated_social_button = new AnimatedSocialButton();