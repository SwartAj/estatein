<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Announcement Bar -->
<div class="announcement-bar">
    Discover Your Dream Property with Estatein.
    <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>">Learn More</a>
</div>

<!-- Site Header -->
<header class="site-header" role="banner">
    <div class="header-inner">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="Estatein Home">
            <?php echo estatein_logo_svg(); ?>
        </a>

        <!-- Primary Navigation -->
        <nav class="site-nav" role="navigation" aria-label="Primary">
            <?php
            $nav_pages = [
                'Home'       => home_url( '/' ),
                'About Us'   => home_url( '/about' ),
                'Properties' => home_url( '/properties' ),
                'Services'   => home_url( '/services' ),
            ];
            $current_url = ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            foreach ( $nav_pages as $label => $url ) :
                $active = ( rtrim( $current_url, '/' ) === rtrim( $url, '/' ) ) ? ' class="active"' : '';
            ?>
                <a href="<?php echo esc_url( $url ); ?>"<?php echo $active; ?>><?php echo esc_html( $label ); ?></a>
            <?php endforeach; ?>
        </nav>

        <!-- Contact Button -->
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-header">Contact Us</a>

        <!-- Hamburger -->
        <button class="hamburger" aria-label="Toggle Menu" aria-expanded="false" aria-controls="mobile-menu">
            <span></span><span></span><span></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu" role="navigation" aria-label="Mobile">
        <?php foreach ( $nav_pages as $label => $url ) : ?>
            <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-primary-sm">Contact Us</a>
    </div>
</header>
