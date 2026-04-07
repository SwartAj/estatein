<?php
/**
 * 404 Error Page Template
 *
 * @package Estatein
 */
get_header();
?>

<section class="section" style="min-height:60vh;display:flex;align-items:center">
    <div class="container" style="text-align:center">
        <div style="font-size:120px;font-weight:800;color:var(--accent);line-height:1;margin-bottom:16px">404</div>
        <h1 style="font-size:clamp(24px,3vw,40px);font-weight:700;margin-bottom:14px">Page Not Found</h1>
        <p style="color:var(--text-secondary);font-size:15px;max-width:480px;margin:0 auto 32px;line-height:1.7">
            The page you're looking for doesn't exist or has been moved. Let's get you back on track.
        </p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">Back to Home</a>
            <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-secondary btn-lg">Browse Properties</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
</section>

<?php get_footer(); ?>
