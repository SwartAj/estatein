<?php
/**
 * Front Page (Home) Template
 *
 * @package Estatein
 */
get_header();
?>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="hero-section" id="hero">
    <div class="hero-inner">
        <div class="hero-content">
            <p class="section-tag">No.1 Real Estate Company</p>
            <h1 class="hero-title">
                Discover Your Dream Property with
                <span class="accent">Estatein</span>
            </h1>
            <p class="hero-desc">
                Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams. Your perfect home is just a click away.
            </p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-secondary">Learn More</a>
                <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary">Browse Properties</a>
            </div>

            <!-- Stats -->
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10k+</div>
                    <div class="stat-label">Properties For Sale</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">16+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
            </div>
        </div>

        <div class="hero-image-wrap">
            <div class="hero-building">
                <?php
                // Display featured image if set on front page, otherwise show CSS building
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'property-detail', [ 'alt' => 'Estatein Properties' ] );
                } else {
                ?>
                <img src="http://growmodo.local/wp-content/uploads/2026/04/pexels-introspectivedsgn-4279989-scaled.jpg" alt="Estatein Properties" style="width:100%;height:100%;object-fit:cover;border-radius:var(--radius-xl)">
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SERVICES STRIP
     ============================================================ -->
<section class="services-strip" id="features">
    <div class="container">
        <div class="services-strip-header">
            <div>
                <p class="section-tag">Our Services</p>
                <h2 class="section-title" style="font-size:clamp(20px,2.5vw,28px);margin-bottom:0">Elevate Your Real Estate Experience</h2>
            </div>
            <div class="strip-nav" aria-label="Carousel navigation">
                <button class="carousel-btn prev" aria-label="Previous"><?php echo estatein_icon( 'arrow-l' ); ?></button>
                <button class="carousel-btn next" aria-label="Next"><?php echo estatein_icon( 'arrow-r' ); ?></button>
            </div>
        </div>

        <div class="services-track" role="list">
            <div class="service-card" role="listitem">
                <div class="service-icon"><?php echo estatein_icon( 'home' ); ?></div>
                <h3>Find Your Dream Home</h3>
                <p>Unlock the door to your dream home with our extensive listings and expert guidance.</p>
            </div>
            <div class="service-card" role="listitem">
                <div class="service-icon"><?php echo estatein_icon( 'chart' ); ?></div>
                <h3>Unlock Property Value</h3>
                <p>Understand your property's worth with our precise valuation services, empowered by market data.</p>
            </div>
            <div class="service-card" role="listitem">
                <div class="service-icon"><?php echo estatein_icon( 'settings' ); ?></div>
                <h3>Effortless Property Management</h3>
                <p>Experience hassle-free property management with our comprehensive solutions tailored for you.</p>
            </div>
            <div class="service-card" role="listitem">
                <div class="service-icon"><?php echo estatein_icon( 'invest' ); ?></div>
                <h3>Smart Investments, Informed Decisions</h3>
                <p>Navigate the real estate investment landscape with confidence using our expert insights.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FEATURED PROPERTIES
     ============================================================ -->
<section class="section" id="properties">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">Featured Properties</p>
                <h2 class="section-title">Explore our handpicked selection of featured properties</h2>
                <p class="section-desc">Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes, providing key details for your consideration.</p>
            </div>
            <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-secondary" style="flex-shrink:0">View All Properties</a>
        </div>

        <div class="properties-grid" id="featured-grid">
            <?php
            $featured = new WP_Query( [
                'post_type'      => 'property',
                'posts_per_page' => 3,
                'meta_query'     => [ [ 'key' => 'property_featured', 'value' => '1' ] ],
            ] );

            // Fallback: just get latest 3 if no featured marked
            if ( ! $featured->have_posts() ) {
                $featured = new WP_Query( [ 'post_type' => 'property', 'posts_per_page' => 3 ] );
            }

            if ( $featured->have_posts() ) :
                while ( $featured->have_posts() ) : $featured->the_post();
                    $price    = estatein_meta( 'property_price' )    ?: '$950,000';
                    $location = estatein_meta( 'property_location_text' ) ?: 'Malibu, California';
                    $beds     = estatein_meta( 'property_bedrooms' ) ?: '4';
                    $baths    = estatein_meta( 'property_bathrooms' ) ?: '3';
                    $area     = estatein_meta( 'property_area' )     ?: '2,500 Sq Ft';
                    $badge    = estatein_meta( 'property_badge' )    ?: 'Villa';
            ?>
            <article class="property-card">
                <div class="prop-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'property-card', [ 'alt' => get_the_title() ] ); ?>
                    <?php else : ?>
                        <div class="prop-img-placeholder">🏠</div>
                    <?php endif; ?>
                    <span class="prop-badge"><?php echo esc_html( $badge ); ?></span>
                </div>
                <div class="prop-body">
                    <h3 class="prop-name"><?php the_title(); ?></h3>
                    <p class="prop-desc"><?php echo esc_html( get_the_excerpt() ?: 'A beautiful property in a prime location, offering everything you need for a comfortable lifestyle.' ); ?></p>
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
            <!-- Placeholder cards when no properties are added yet -->
            <?php
            $placeholders = [
                [ 'name' => 'Seaside Serenity Villa', 'location' => 'Malibu, California', 'price' => '$950,000', 'badge' => 'Villa', 'beds' => 4, 'baths' => 3, 'area' => '2,500 Sq Ft', 'desc' => 'A stunning beachfront villa with panoramic ocean views, featuring a private pool and modern interiors.' ],
                [ 'name' => 'Metropolitan Haven', 'location' => 'New York City, NY', 'price' => '$550,000', 'badge' => 'Apartment', 'beds' => 2, 'baths' => 2, 'area' => '1,200 Sq Ft', 'desc' => 'A luxurious city apartment offering sweeping skyline views and premium finishes throughout.' ],
                [ 'name' => 'Rustic Retreat Cottage', 'location' => 'Aspen, Colorado', 'price' => '$550,000', 'badge' => 'Cottage', 'beds' => 3, 'baths' => 2, 'area' => '1,800 Sq Ft', 'desc' => 'A charming countryside cottage nestled in nature, perfect for those seeking tranquility.' ],
            ];
            foreach ( $placeholders as $p ) : ?>
            <article class="property-card">
                <div class="prop-img">
                    <div class="prop-img-placeholder">🏠</div>
                    <span class="prop-badge"><?php echo esc_html( $p['badge'] ); ?></span>
                </div>
                <div class="prop-body">
                    <h3 class="prop-name"><?php echo esc_html( $p['name'] ); ?></h3>
                    <p class="prop-desc"><?php echo esc_html( $p['desc'] ); ?></p>
                    <div class="prop-meta">
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bed' ); ?> <?php echo esc_html( $p['beds'] ); ?> Bedrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'bath' ); ?> <?php echo esc_html( $p['baths'] ); ?> Bathrooms</span>
                        <span class="prop-meta-item"><?php echo estatein_icon( 'area' ); ?> <?php echo esc_html( $p['area'] ); ?></span>
                    </div>
                    <div class="prop-footer">
                        <span class="prop-price"><?php echo esc_html( $p['price'] ); ?></span>
                        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary btn-sm">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php endforeach; endif; ?>
        </div>

        <div style="margin-top:28px;padding-top:20px;border-top:1px solid var(--border)">
            <span class="text-muted" style="font-size:13px">1 of <?php echo wp_count_posts('property')->publish ?: 2; ?></span>
        </div>
    </div>
</section>

<!-- ============================================================
     TESTIMONIALS
     ============================================================ -->
<section class="section section-alt" id="testimonials">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">Client Testimonials</p>
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-desc">Read the success stories and heartfelt testimonials from our valued clients. Discover why choosing Estatein for your real estate needs was the best decision they ever made.</p>
            </div>
        </div>

        <div class="testimonials-grid">
            <?php
            $testimonials = new WP_Query( [ 'post_type' => 'testimonial', 'posts_per_page' => 3 ] );
            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) : $testimonials->the_post();
                    $author   = estatein_meta( 'testimonial_author' )   ?: get_the_title();
                    $location = estatein_meta( 'testimonial_location' ) ?: 'United States';
                    $rating   = (int) ( estatein_meta( 'testimonial_rating' ) ?: 5 );
                    $avatar   = estatein_meta( 'testimonial_avatar' );
            ?>
            <div class="testimonial-card">
                <?php echo estatein_stars( $rating ); ?>
                <h4 class="testimonial-title"><?php the_title(); ?></h4>
                <p class="testimonial-text"><?php echo esc_html( get_the_content() ?: get_the_excerpt() ); ?></p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <?php if ( $avatar ) : ?>
                            <img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $author ); ?>">
                        <?php elseif ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail', [ 'alt' => esc_attr( $author ) ] ); ?>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="author-name"><?php echo esc_html( $author ); ?></div>
                        <div class="author-loc"><?php echo esc_html( $location ); ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $fallback_testimonials = [
                    [ 'title' => 'Exceptional Service', 'author' => 'Wade Warren', 'loc' => 'USA, California', 'text' => "Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home an absolute pleasure. Highly recommend!" ],
                    [ 'title' => 'Efficient and Reliable', 'author' => 'Arlene Thomson', 'loc' => 'USA, Florida', 'text' => 'Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn\'t be happier with the results.' ],
                    [ 'title' => 'Trusted Advisors', 'author' => 'John Myers', 'loc' => 'USA, Nevada', 'text' => 'The Estatein team guided us through the entire buying process. Their knowledge and patience ensure we found the right home at the right price.' ],
                ];
                foreach ( $fallback_testimonials as $t ) :
            ?>
            <div class="testimonial-card">
                <?php echo estatein_stars( 5 ); ?>
                <h4 class="testimonial-title"><?php echo esc_html( $t['title'] ); ?></h4>
                <p class="testimonial-text"><?php echo esc_html( $t['text'] ); ?></p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div>
                        <div class="author-name"><?php echo esc_html( $t['author'] ); ?></div>
                        <div class="author-loc"><?php echo esc_html( $t['loc'] ); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:28px;padding-top:20px;border-top:1px solid var(--border)">
            <span class="text-muted" style="font-size:13px">1 of <?php echo wp_count_posts('property')->publish ?: 2; ?></span>
            <div style="display:flex;gap:8px">
                <button class="carousel-btn prev" aria-label="Previous"><?php echo estatein_icon( 'arrow-l' ); ?></button>
                <button class="carousel-btn next" aria-label="Next"><?php echo estatein_icon( 'arrow-r' ); ?></button>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FAQ
     ============================================================ -->
<section class="section" id="faq">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">FAQ</p>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and support every step of the way.</p>
            </div>
            <a href="#" class="btn btn-secondary" style="flex-shrink:0">View All FAQs</a>
        </div>

        <div class="faq-list" style="max-width:800px">
            <?php
            $faqs = [
                [ 'q' => 'How do I search for properties on Estatein?', 'a' => 'Simply use our search feature and enter your desired location, property type, and price range. You can filter results by number of bedrooms, bathrooms, and other features to find your perfect match.' ],
                [ 'q' => 'What documents do I need to sell my property through Estatein?', 'a' => 'You\'ll typically need the property deed, recent tax documents, and any inspection reports. Our agents will guide you through the full documentation process to ensure a smooth transaction.' ],
                [ 'q' => 'How can I contact an Estatein agent?', 'a' => 'You can reach us through our contact form, by phone, or via email. Our agents are available Monday through Friday, 9 AM to 6 PM. We typically respond within 24 hours.' ],
            ];
            foreach ( $faqs as $i => $faq ) :
            ?>
            <div class="faq-item<?php echo $i === 0 ? ' active' : ''; ?>">
                <div class="faq-question" role="button" tabindex="0" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                    <span><?php echo esc_html( $faq['q'] ); ?></span>
                    <span class="faq-toggle" aria-hidden="true">+</span>
                </div>
                <div class="faq-answer"><?php echo esc_html( $faq['a'] ); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     CTA
     ============================================================ -->
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary btn-lg">Explore Properties</a>
    </div>
</section>

<?php get_footer(); ?>
