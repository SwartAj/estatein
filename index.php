<?php
/**
 * Fallback index template.
 * WordPress requires this file. Front page uses front-page.php.
 */
get_header();
?>
<main class="container section">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
