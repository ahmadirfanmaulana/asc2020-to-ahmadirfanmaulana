<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

    <div id="loader">
        <div class="loader-wrapper"></div>
        <div class="loader-caption">
            <h1>Kazan Museum Tour</h1>
        </div>
    </div>

    <header id="header">
        <div class="container">
            <div id="branding">
                <div id="site-title">
                    <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                    </h1>
                </div>
            </div>

            <nav id="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </nav>
        </div>
    </header>

    <div id="container">