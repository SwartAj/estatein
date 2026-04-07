<?php
/**
 * Archive Template for Properties CPT
 *
 * @package Estatein
 */
get_header();

$paged      = max( 1, get_query_var( 'paged' ) );
$properties = new WP_Query( [
    'post_type'      => 'property',
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish',
] );
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-content">
                <p class="section-tag">Properties</p>
                <h1>Find Your Dream Property</h1>
                <p>Welcome to Estatein, where your dream property awaits in our diverse portfolio of exceptional homes.</p>
            </div>
        </div>
    </div>
</section>

<!-- PROPERTIES GRID -->
<section class="section">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">All Properties</p>
                <h2 class="section-title">Discover a World of Possibilities</h2>
            </div>
        </div>

        <div class="properties-grid">
            <?php if ( $properties->have_posts() ) :
                while ( $properties->have_posts() ) : $properties->the_post();
                    $price    = estatein_meta( 'property_price' )         ?: '$950,000';
                    $location = estatein_meta( 'property_location_text' ) ?: 'United States';
                    $beds     = estatein_meta( 'property_bedrooms' )      ?: '4';
                    $baths    = estatein_meta( 'property_bathrooms' )     ?: '3';
                    $area     = estatein_meta( 'property_area' )          ?: '2,500 Sq Ft';
                    $badge    = estatein_meta( 'property_badge' )         ?: 'Property';
            ?>
            <article class="property-card">
                <div class="prop-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'property-card', [ 'alt' => esc_attr( get_the_title() ) ] ); ?>
                    <?php else : ?>
                        <div class="prop-img-placeholder">🏠</div>
                    <?php endif; ?>
                    <span class="prop-badge"><?php echo esc_html( $badge ); ?></span>
                </div>
                <div class="prop-body">
                    <p class="text-muted" style="font-size:12px;margin-bottom:4px"><?php echo esc_html( $location ); ?></p>
                    <h3 class="prop-name"><?php the_title(); ?></h3>
                    <p class="prop-desc"><?php echo esc_html( get_the_excerpt() ?: 'A beautiful property offering exceptional living spaces in a prime location.' ); ?></p>
                    <div class="prop-meta">
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bed' ); ?> <?php echo esc_html( $beds ); ?> Bedrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bath' ); ?> <?php echo esc_html( $baths ); ?> Bathrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'area' ); ?> <?php echo esc_html( $area ); ?></span>
                    </div>
                    <div class="prop-footer">
                        <span class="prop-price"><?php echo esc_html( $price ); ?></span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php endwhile; wp_reset_postdata();
            else : ?>
                <p class="text-muted" style="grid-column:1/-1;padding:40px 0">No properties found. Add properties from the WordPress dashboard.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <span class="pagination-info">
                Showing <?php echo $properties->post_count; ?> of <?php echo $properties->found_posts; ?> Properties
            </span>
            <div class="pagination-btns">
                <?php echo paginate_links( [
                    'total'     => $properties->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => estatein_icon( 'arrow-l' ),
                    'next_text' => estatein_icon( 'arrow-r' ),
                ] ); ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
</section>

<?php get_footer(); ?>
