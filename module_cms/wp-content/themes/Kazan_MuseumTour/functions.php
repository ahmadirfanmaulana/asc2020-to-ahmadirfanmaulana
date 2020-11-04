<?php

// init
add_action('init', function () {

    // register social menu
    register_post_type('social-media', [
       'label' => 'Social Media Links',
       'public' => true,
       'menu_icon' => 'dashicons-share',
    ]);

});

// login style
add_action('login_enqueue_scripts', function () {
    $museums = get_museums();
    $rand = rand(0, count($museums)-1);
    $item = $museums[$rand];
   ?>
    <style>
        #login h1 a {
            background: unset;
        }
        body {
            background: url("<?= get_the_post_thumbnail_url($item->ID); ?>") !important;
            background-size: cover;
        }
        body::before {
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.8);
            content: '';
            position: absolute;
            left: 0;
            top: 0;
        }
        #login {
            position: relative;
            z-index: 99;
        }
        .login #backtoblog a, .login #nav a{
            color: #fff !important;
        }
    </style>
    <?php
});

// scripts
add_action('wp_enqueue_scripts', function () {
   wp_enqueue_script('kazan-museum-script', get_stylesheet_directory_uri() . '/js/main.js');
   wp_enqueue_style('kazan-museum-style', get_stylesheet_directory_uri() . '/css/main.css');
});

// get museums
function get_museums () {
    $args = [
        'post_type' => 'page',
        'posts_per_page' => -1,
    ];

    $posts = get_posts( $args );

    $museums = [];

    foreach ($posts as $post) {
        if ($post->post_title != 'News' && $post->post_title != 'Museums') {
            $museums[] = $post;
        }
    }

    return $museums;
}

// get news
function get_news ($state) {
    $args = [
        'post_type' => 'post',
    ];

    if ($state == 'limit') {
        $args['posts_per_page'] = 4;
    } else {
        $args['posts_per_page'] = -1;
    }

    $posts = get_posts( $args );

    return $posts;
}

