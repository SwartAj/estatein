<?php
/**
 * Generic Page Template — fallback for pages without a specific template.
 *
 * @package Estatein
 */
get_header();
?>
<main class="container section">
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 style="font-size:clamp(28px,4vw,44px);font-weight:700;margin-bottom:24px;"><?php the_title(); ?></h1>
        <div style="color:var(--text-secondary);font-size:15px;line-height:1.8;">
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; ?>
</main>
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary btn-lg">Explore Properties</a>
    </div>
</section>
<?php get_footer(); ?>
