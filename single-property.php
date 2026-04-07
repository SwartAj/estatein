<?php
/**
 * Single Property Template
 *
 * @package Estatein
 */
get_header();

while ( have_posts() ) : the_post();
    $price       = estatein_meta( 'property_price' )            ?: '$1,280,000';
    $location    = estatein_meta( 'property_location_text' )    ?: 'Malibu, California';
    $beds        = estatein_meta( 'property_bedrooms' )         ?: '4';
    $baths       = estatein_meta( 'property_bathrooms' )        ?: '3';
    $area        = estatein_meta( 'property_area' )             ?: '2,500 Sq Ft';
    // Get full-size URLs from ACF image arrays
    $g1          = estatein_meta( 'property_gallery_1' );
    $g2          = estatein_meta( 'property_gallery_2' );
    $g3          = estatein_meta( 'property_gallery_3' );
    $g4          = estatein_meta( 'property_gallery_4' );
    $gallery_1   = is_array( $g1 ) ? $g1['url'] : $g1;
    $gallery_2   = is_array( $g2 ) ? $g2['url'] : $g2;
    $gallery_3   = is_array( $g3 ) ? $g3['url'] : $g3;
    $gallery_4   = is_array( $g4 ) ? $g4['url'] : $g4;
    $key_features_raw = estatein_meta( 'property_key_features' );
    $key_features = $key_features_raw ? array_filter( explode( "\n", $key_features_raw ) ) : [
        'Expansive floor-to-ceiling windows with panoramic ocean views',
        'State-of-the-art kitchen with top-of-the-line appliances',
        'Spa-inspired bathrooms for relaxing full-length experience',
        'Private pool and landscaped garden',
        'Smart home technology throughout the property',
    ];
    $hoa         = estatein_meta( 'property_hoa' )          ?: '$300';
    $prop_tax    = estatein_meta( 'property_tax' )          ?: '$5,800';
    $maintenance = estatein_meta( 'property_maintenance' )  ?: '$1,200';
    $badge       = estatein_meta( 'property_badge' )        ?: 'Villa';

    // Gallery images — use Gallery Image 1 as main, rest as thumbs
    $main_img   = $gallery_1 ?: get_the_post_thumbnail_url( null, 'property-detail' );
    $thumb_imgs = array_filter( [ $gallery_2, $gallery_3, $gallery_4 ] );
endwhile;
rewind_posts();
?>

<!-- PROPERTY HEADER -->
<div class="prop-detail-header">
    <div class="container">
        <div class="prop-detail-title-row">
            <div>
                <h1 class="prop-detail-title"><?php the_title(); ?></h1>
                <div class="prop-detail-loc">
                    <?php echo estatein_icon( 'location' ); ?>
                    <span><?php echo esc_html( $location ); ?></span>
                </div>
            </div>
            <div style="text-align:right">
                <div class="prop-detail-price"><?php echo esc_html( $price ); ?></div>
                <div class="text-muted" style="font-size:13px">Property Price</div>
            </div>
        </div>
    </div>
</div>

<!-- GALLERY -->
<div class="container">
    <div class="prop-gallery">
        <div class="gallery-main">
            <?php if ( $main_img ) : ?>
                <img src="<?php echo esc_url( $main_img ); ?>" alt="<?php the_title_attribute(); ?>">
            <?php elseif ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'property-detail', [ 'alt' => get_the_title() ] ); ?>
            <?php else : ?>
                <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a2a3a,#2a3a50);display:flex;align-items:center;justify-content:center;font-size:80px">🏠</div>
            <?php endif; ?>
        </div>
        <div class="gallery-thumbs">
            <?php if ( ! empty( $thumb_imgs ) ) :
                foreach ( array_slice( $thumb_imgs, 0, 2 ) as $img_url ) :
            ?>
                <div class="gallery-thumb">
                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
            <?php endforeach;
            else :
                for ( $i = 0; $i < 2; $i++ ) :
            ?>
                <div class="gallery-thumb">
                    <div style="width:100%;height:100%;min-height:140px;background:linear-gradient(135deg,#1C2A3A,#2A3A50);display:flex;align-items:center;justify-content:center;font-size:40px">🛋️</div>
                </div>
            <?php endfor; endif; ?>
        </div>
    </div>
</div>

<!-- PROPERTY DETAIL CONTENT -->
<div class="container">
    <div class="prop-detail-grid">

        <!-- Left Column: Description + Key Features + Pricing -->
        <div>
            <!-- Description -->
            <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius-lg);padding:28px;margin-bottom:24px">
                <h2 style="font-size:18px;font-weight:600;margin-bottom:14px">Description</h2>
                <div style="color:var(--text-secondary);font-size:14px;line-height:1.7">
                    <?php the_content(); ?>
                    <?php if ( ! get_the_content() ) : ?>
                        <p>Discover the epitome of luxury living in this stunning <?php echo esc_html( $badge ); ?>. Nestled in <?php echo esc_html( $location ); ?>, this property offers breathtaking views and world-class amenities.</p>
                        <p>Every inch of this property has been carefully designed to provide the perfect blend of comfort and elegance. The open-plan living areas flow seamlessly to the outdoor spaces, making it ideal for both relaxing and entertaining.</p>
                    <?php endif; ?>
                </div>

                <!-- Property Features -->
                <div class="prop-features">
                    <div class="prop-feature-item"><?php echo estatein_icon( 'bed' ); ?> <span><?php echo esc_html( $beds ); ?> Bedrooms</span></div>
                    <div class="prop-feature-item"><?php echo estatein_icon( 'bath' ); ?> <span><?php echo esc_html( $baths ); ?> Bathrooms</span></div>
                    <div class="prop-feature-item"><?php echo estatein_icon( 'area' ); ?> <span><?php echo esc_html( $area ); ?></span></div>
                </div>
            </div>

            <!-- Key Features & Amenities -->
            <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius-lg);padding:28px;margin-bottom:24px">
                <h2 style="font-size:18px;font-weight:600;margin-bottom:14px">Key Features &amp; Amenities</h2>
                <ul class="key-features-list">
                    <?php foreach ( $key_features as $feature ) : ?>
                        <li><?php echo estatein_icon( 'check' ); ?> <span><?php echo esc_html( trim( $feature ) ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Comprehensive Pricing -->
            <div>
                <p class="section-tag">Pricing</p>
                <h2 style="font-size:22px;font-weight:700;margin-bottom:8px">Comprehensive Pricing Details</h2>
                <p style="color:var(--text-secondary);font-size:14px;margin-bottom:20px">Our pricing details are transparent and comprehensive, designed to give you a clear understanding of all costs involved. We believe in straightforward pricing for an informed decision.</p>

                <!-- Base Price Table -->
                <div class="pricing-table" style="margin-bottom:16px">
                    <div class="pricing-head">
                        <span class="pricing-head-title">Base Price</span>
                        <span class="pricing-head-label">Learn More</span>
                    </div>
                    <div class="pricing-row">
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Listed Price</div>
                            <div class="pricing-cell-value"><?php echo esc_html( $price ); ?></div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Additional Fees</div>
                            <div class="pricing-cell-value">$12,000</div>
                            <div class="pricing-cell-note">Covering legal and contractual obligations</div>
                        </div>
                    </div>
                </div>

                <!-- Additional Costs Table -->
                <div class="pricing-table" style="margin-bottom:16px">
                    <div class="pricing-head">
                        <span class="pricing-head-title">Additional Costs</span>
                        <span class="pricing-head-label">Learn More</span>
                    </div>
                    <div class="pricing-row">
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Commissions</div>
                            <div class="pricing-cell-value">$50,000</div>
                            <div class="pricing-cell-note">Broker fees for facilitating the transaction</div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Closing Costs</div>
                            <div class="pricing-cell-value">$1,200</div>
                            <div class="pricing-cell-note">Annual cost for uninterrupted property insurance</div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Inspection Fee</div>
                            <div class="pricing-cell-value">$800</div>
                            <div class="pricing-cell-note">Payment for advertising the property</div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Utility Setup</div>
                            <div class="pricing-cell-value">Variable</div>
                            <div class="pricing-cell-note">Applicable taxes paid on to transfer ownership</div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Costs Table -->
                <div class="pricing-table" style="margin-bottom:16px">
                    <div class="pricing-head">
                        <span class="pricing-head-title">Monthly Costs</span>
                        <span class="pricing-head-label">Learn More</span>
                    </div>
                    <div class="pricing-row">
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">HOA Fees</div>
                            <div class="pricing-cell-value"><?php echo esc_html( $hoa ); ?></div>
                            <div class="pricing-cell-note">Monthly property upkeep & community fees</div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Concierge Services</div>
                            <div class="pricing-cell-value"><?php echo esc_html( $maintenance ); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Total Estimated Cost -->
                <div class="pricing-table">
                    <div class="pricing-head">
                        <span class="pricing-head-title">Total Estimated Costs</span>
                        <span class="pricing-head-label">Learn More</span>
                    </div>
                    <div class="pricing-row">
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Base Price</div>
                            <div class="pricing-cell-value"><?php echo esc_html( $price ); ?></div>
                        </div>
                        <div class="pricing-cell">
                            <div class="pricing-cell-label">Taxes</div>
                            <div class="pricing-cell-value"><?php echo esc_html( $prop_tax ); ?></div>
                            <div class="pricing-cell-note">Variable</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Inquiry Form -->
        <div>
            <div class="form-box" style="position:sticky;top:90px">
                <p class="section-tag" style="margin-bottom:8px">Inquire About</p>
                <h3 style="font-size:18px;font-weight:600;margin-bottom:6px">Inquire About <?php the_title(); ?></h3>
                <p style="font-size:13px;color:var(--text-secondary);margin-bottom:20px">Interested in this property? Fill out the form below and one of our agents will be in touch with you shortly.</p>

                <form class="estatein-form" method="post" action="#" style="display:flex;flex-direction:column;gap:14px">
                    <?php wp_nonce_field( 'estatein_property_inquiry', '_inquiry_nonce' ); ?>
                    <input type="hidden" name="property_id" value="<?php the_ID(); ?>">
                    <input type="hidden" name="property_title" value="<?php the_title_attribute(); ?>">

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label>Desired Property</label>
                        <input type="text" name="property" value="<?php the_title_attribute(); ?>, <?php echo esc_attr( $location ); ?>" readonly style="cursor:default">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" placeholder="Enter your message here…" style="min-height:100px"></textarea>
                    </div>
                    <label class="form-check" style="grid-column:unset">
                        <input type="checkbox" name="agree_terms" required>
                        I agree with <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                    </label>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">Send Your Message</button>
                </form>
            </div>
        </div>

    </div><!-- .prop-detail-grid -->
</div>

<!-- FAQ -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">FAQ</p>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Find quick answers to common questions about this property and the real estate process.</p>
            </div>
            <a href="#" class="btn btn-secondary" style="flex-shrink:0">View All FAQs</a>
        </div>
        <div class="faq-list" style="max-width:800px">
            <?php
            $faqs = [
                [ 'q' => 'How do I search for properties on Estatein?', 'a' => 'Simply use our search feature to enter your desired location, property type, and price range. Our advanced filters make finding your ideal property straightforward and intuitive.' ],
                [ 'q' => 'What documents do I need to sell my property through Estatein?', 'a' => 'You will typically need the property title deed, recent property tax receipts, identity documents, and any relevant certificates. Our agents will provide a complete checklist tailored to your situation.' ],
                [ 'q' => 'How can I contact an Estatein agent?', 'a' => 'Reach us through the inquiry form, by phone at +1 (555) 123-4567, or via email at info@estatein.com. Our agents are available Monday to Friday, 9 AM – 6 PM and typically respond within 24 hours.' ],
            ];
            foreach ( $faqs as $i => $faq ) :
            ?>
            <div class="faq-item<?php echo $i === 0 ? ' active' : ''; ?>">
                <div class="faq-question"><span><?php echo esc_html( $faq['q'] ); ?></span><span class="faq-toggle">+</span></div>
                <div class="faq-answer"><?php echo esc_html( $faq['a'] ); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="cta-title">Start Your Real Estate <span class="accent">Journey</span> Today</h2>
        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary btn-lg">Explore Properties</a>
    </div>
</section>

<?php get_footer(); ?>
