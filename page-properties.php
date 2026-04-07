<?php
/**
 * Template Name: Properties
 *
 * @package Estatein
 */
get_header();

// Pagination
$paged = max( 1, get_query_var( 'paged' ) );

// Build query args
$args = [
    'post_type'      => 'property',
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish',
];

// Apply filters if submitted
$filter_type     = isset( $_GET['type'] )     ? sanitize_text_field( $_GET['type'] )     : '';
$filter_location = isset( $_GET['location'] ) ? sanitize_text_field( $_GET['location'] ) : '';
$filter_search   = isset( $_GET['s'] )        ? sanitize_text_field( $_GET['s'] )        : '';

if ( $filter_type ) {
    $args['tax_query'] = [ [ 'taxonomy' => 'property_type', 'field' => 'slug', 'terms' => $filter_type ] ];
}
if ( $filter_search ) {
    $args['s'] = $filter_search;
}

$properties = new WP_Query( $args );
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-content">
                <p class="section-tag">Properties</p>
                <h1>Find Your Dream Property</h1>
                <p>Welcome to Estatein, where your dream property awaits. Explore our carefully curated selection of properties, each offering a unique blend of comfort and style.</p>
            </div>
        </div>
    </div>
</section>

<!-- SEARCH & FILTER -->
<section class="search-section">
    <div class="container">
        <form action="<?php echo esc_url( get_permalink() ); ?>" method="GET" id="property-filter-form">
            <div class="search-bar-wrap">
                <?php echo estatein_icon( 'search' ); ?>
                <input type="text" name="s" placeholder="Search For A Property" value="<?php echo esc_attr( $filter_search ); ?>" aria-label="Search properties">
                <button type="submit" class="btn btn-primary btn-sm" style="border-radius:6px">Find Properties</button>
            </div>
            <div class="filter-row">
                <select name="location" class="filter-select" aria-label="Location">
                    <option value="">Location</option>
                    <?php
                    $locations = get_terms( [ 'taxonomy' => 'property_location', 'hide_empty' => false ] );
                    if ( ! is_wp_error( $locations ) ) {
                        foreach ( $locations as $loc ) {
                            $selected = selected( $filter_location, $loc->slug, false );
                            echo '<option value="' . esc_attr( $loc->slug ) . '"' . $selected . '>' . esc_html( $loc->name ) . '</option>';
                        }
                    }
                    ?>
                    <option value="california"<?php selected( $filter_location, 'california' ); ?>>California</option>
                    <option value="new-york"<?php selected( $filter_location, 'new-york' ); ?>>New York</option>
                    <option value="miami"<?php selected( $filter_location, 'miami' ); ?>>Miami</option>
                </select>

                <select name="type" class="filter-select" aria-label="Property Type">
                    <option value="">Property Type</option>
                    <?php
                    $prop_types = get_terms( [ 'taxonomy' => 'property_type', 'hide_empty' => false ] );
                    if ( ! is_wp_error( $prop_types ) ) {
                        foreach ( $prop_types as $pt ) {
                            $selected = selected( $filter_type, $pt->slug, false );
                            echo '<option value="' . esc_attr( $pt->slug ) . '"' . $selected . '>' . esc_html( $pt->name ) . '</option>';
                        }
                    }
                    ?>
                    <option value="villa">Villa</option>
                    <option value="apartment">Apartment</option>
                    <option value="cottage">Cottage</option>
                    <option value="commercial">Commercial</option>
                </select>

                <select name="price_min" class="filter-select" aria-label="Pricing Range">
                    <option value="">Pricing Range</option>
                    <option value="0">Under $250,000</option>
                    <option value="250000">$250k – $500k</option>
                    <option value="500000">$500k – $1M</option>
                    <option value="1000000">$1M+</option>
                </select>

                <select name="property_size" class="filter-select" aria-label="Property Size">
                    <option value="">Property Size</option>
                    <option value="small">Under 1,000 Sq Ft</option>
                    <option value="medium">1,000 – 2,500 Sq Ft</option>
                    <option value="large">2,500+ Sq Ft</option>
                </select>

                <select name="build_year" class="filter-select" aria-label="Build Year">
                    <option value="">Build Year</option>
                    <option value="2020">2020 – Present</option>
                    <option value="2010">2010 – 2020</option>
                    <option value="2000">2000 – 2010</option>
                </select>
            </div>
        </form>
    </div>
</section>

<!-- PROPERTIES GRID -->
<section class="section">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">Properties</p>
                <h2 class="section-title">Discover a World of Possibilities</h2>
                <p class="section-desc">Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.</p>
            </div>
        </div>

        <div class="properties-grid" id="properties-grid">
            <?php if ( $properties->have_posts() ) :
                while ( $properties->have_posts() ) : $properties->the_post();
                    $price    = estatein_meta( 'property_price' )            ?: '$950,000';
                    $location = estatein_meta( 'property_location_text' )    ?: 'United States';
                    $beds     = estatein_meta( 'property_bedrooms' )         ?: '4';
                    $baths    = estatein_meta( 'property_bathrooms' )        ?: '3';
                    $area     = estatein_meta( 'property_area' )             ?: '2,500 Sq Ft';
                    $badge    = estatein_meta( 'property_badge' )            ?: 'Property';
                    $excerpt  = get_the_excerpt() ?: 'A beautiful property offering exceptional living spaces and premium amenities in a prime location.';
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
                    <p class="prop-desc"><?php echo esc_html( $excerpt ); ?></p>
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
            else :
                // Placeholder cards
                $placeholders = [
                    [ 'name' => 'Seaside Serenity Villa', 'cat' => 'Coastal Dream – Where Waves Beckon', 'location' => 'Malibu, California', 'price' => '$1,290,000', 'badge' => 'Villa', 'beds' => 4, 'baths' => 3, 'area' => '2,500 Sq Ft', 'desc' => 'Take up the waves of fortune in this beachfront paradise. The villa offers an unmatched blend of natural beauty.' ],
                    [ 'name' => 'Metropolitan Haven', 'cat' => 'Urban Oasis – Life in the City', 'location' => 'New York City, NY', 'price' => '$680,000', 'badge' => 'Apartment', 'beds' => 2, 'baths' => 2, 'area' => '1,200 Sq Ft', 'desc' => 'Immerse yourself in the urban heartbeat of the city. The modern apartment offers unparalleled luxury.' ],
                    [ 'name' => 'Rustic Retreat Cottage', 'cat' => 'Countryside Charm – Escape to Nature\'s Beauty', 'location' => 'Aspen, Colorado', 'price' => '$580,000', 'badge' => 'Cottage', 'beds' => 3, 'baths' => 2, 'area' => '1,800 Sq Ft', 'desc' => 'The charming cottage offers a tranquil escape from the bustle of modern life, set in picturesque countryside.' ],
                ];
                foreach ( $placeholders as $p ) :
            ?>
            <article class="property-card">
                <div class="prop-img">
                    <div class="prop-img-placeholder">🏠</div>
                    <span class="prop-badge"><?php echo esc_html( $p['badge'] ); ?></span>
                </div>
                <div class="prop-body">
                    <p class="text-muted" style="font-size:12px;margin-bottom:4px"><?php echo esc_html( $p['cat'] ); ?></p>
                    <h3 class="prop-name"><?php echo esc_html( $p['name'] ); ?></h3>
                    <p class="prop-desc"><?php echo esc_html( $p['desc'] ); ?></p>
                    <div class="prop-meta">
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bed' ); ?> <?php echo esc_html( $p['beds'] ); ?> Bedrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bath' ); ?> <?php echo esc_html( $p['baths'] ); ?> Bathrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'area' ); ?> <?php echo esc_html( $p['area'] ); ?></span>
                    </div>
                    <div class="prop-footer">
                        <span class="prop-price"><?php echo esc_html( $p['price'] ); ?></span>
                        <a href="#" class="btn btn-primary btn-sm">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php endforeach; endif; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <span class="pagination-info">
                <?php printf( '%d of %d Properties', $properties->post_count, max( $properties->found_posts, 3 ) ); ?>
            </span>
            <div class="pagination-btns">
                <?php
                echo paginate_links( [
                    'total'    => $properties->max_num_pages,
                    'current'  => $paged,
                    'prev_text' => estatein_icon( 'arrow-l' ),
                    'next_text' => estatein_icon( 'arrow-r' ),
                    'type'     => 'list',
                ] );
                ?>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT FORM — Let's Make it Happen -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Contact Us</p>
            <h2 class="section-title">Let's Make it Happen</h2>
            <p class="section-desc">Ready to take the first step toward your dream property? Fill in the form below and we'll get back to you with personalised assistance and guidance.</p>
        </div>

        <div class="form-box" style="max-width:860px">
            <form class="form-grid estatein-form" method="post" action="#">
                <?php wp_nonce_field( 'estatein_property_inquiry', '_inquiry_nonce' ); ?>

                <div class="form-group">
                    <label for="pi-fname">First Name</label>
                    <input type="text" id="pi-fname" name="first_name" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for="pi-lname">Last Name</label>
                    <input type="text" id="pi-lname" name="last_name" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label for="pi-email">Email</label>
                    <input type="email" id="pi-email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="pi-phone">Phone</label>
                    <input type="tel" id="pi-phone" name="phone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="pi-location">Preferred Location</label>
                    <select id="pi-location" name="preferred_location">
                        <option value="">Select Location</option>
                        <option>California</option>
                        <option>New York</option>
                        <option>Florida</option>
                        <option>Texas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pi-type">Property Type</label>
                    <select id="pi-type" name="property_type">
                        <option value="">Select Property Type</option>
                        <option>Villa</option>
                        <option>Apartment</option>
                        <option>Cottage</option>
                        <option>Commercial</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pi-beds">No. of Bathrooms</label>
                    <select id="pi-beds" name="bathrooms">
                        <option value="">Select No. of Bathrooms</option>
                        <option>1</option><option>2</option><option>3</option><option>4+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pi-rooms">No. of Bedrooms</label>
                    <select id="pi-rooms" name="bedrooms">
                        <option value="">Select No. of Bedrooms</option>
                        <option>1</option><option>2</option><option>3</option><option>4</option><option>5+</option>
                    </select>
                </div>
                <div class="form-group span2">
                    <label for="pi-budget">Budget</label>
                    <select id="pi-budget" name="budget">
                        <option value="">Select Budget</option>
                        <option>Under $250,000</option>
                        <option>$250,000 – $500,000</option>
                        <option>$500,000 – $1,000,000</option>
                        <option>$1,000,000+</option>
                    </select>
                </div>
                <div class="form-group span2">
                    <label>Preferred Contact Method</label>
                    <div class="contact-method-row">
                        <input type="tel" name="preferred_phone" placeholder="Phone">
                        <input type="email" name="preferred_email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group span2">
                    <label for="pi-message">Message</label>
                    <textarea id="pi-message" name="message" placeholder="Enter your message here…"></textarea>
                </div>
                <label class="form-check">
                    <input type="checkbox" name="agree_terms" required>
                    I agree with <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                </label>
                <div class="span2" style="margin-top:8px">
                    <button type="submit" class="btn btn-primary btn-lg">Send Your Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-lg">Explore Properties</a>
    </div>
</section>

<?php get_footer(); ?>
