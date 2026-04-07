<?php
/**
 * Template Name: Services
 *
 * @package Estatein
 */
get_header();
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-content">
                <p class="section-tag">Our Services</p>
                <h1>Elevate Your Real Estate Experience</h1>
                <p>At Estatein, we provide a comprehensive suite of real estate services designed to help you navigate every stage of the property journey with confidence and ease.</p>

                <!-- Service Icons Strip -->
                <div class="service-icons-grid" style="margin-top:28px">
                    <div class="service-icon-card">
                        <div class="service-icon-wrap"><?php echo estatein_icon( 'home' ); ?></div>
                        <div class="service-icon-title">Find Your Dream Home</div>
                    </div>
                    <div class="service-icon-card">
                        <div class="service-icon-wrap"><?php echo estatein_icon( 'chart' ); ?></div>
                        <div class="service-icon-title">Unlock Property Value</div>
                    </div>
                    <div class="service-icon-card">
                        <div class="service-icon-wrap"><?php echo estatein_icon( 'settings' ); ?></div>
                        <div class="service-icon-title">Effortless Property Management</div>
                    </div>
                    <div class="service-icon-card">
                        <div class="service-icon-wrap"><?php echo estatein_icon( 'invest' ); ?></div>
                        <div class="service-icon-title">Smart Investments, Informed Decisions</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     UNLOCK PROPERTY VALUE
     ============================================================ -->
<section class="service-section" id="valuation">
    <div class="container">
        <div class="service-section-header">
            <p class="section-tag">Unlock Property Value</p>
            <h2 class="section-title">Unlock Property Value</h2>
            <p class="section-desc">Selling your property with Estatein is a seamless experience. Our team of experts is committed to securing the best deal possible. Here's a closer look at our proven process.</p>
        </div>

        <div class="service-features-grid">
            <?php
            $valuation_services = [
                [ 'icon' => 'home',    'title' => 'Valuation Mastery',      'desc' => 'Determine the true value of your property with our comprehensive valuations, empowered by market data and expert insights.' ],
                [ 'icon' => 'chart',   'title' => 'Strategic Marketing',    'desc' => 'Utilise a cutting-edge marketing strategy that showcases your property to the right buyers in the right places at the right time.' ],
                [ 'icon' => 'invest',  'title' => 'Negotiation Wizardry',   'desc' => 'Benefit from our skilled negotiators who work tirelessly in your best interest to secure the most favourable terms and price.' ],
                [ 'icon' => 'star',    'title' => 'Closing Success',        'desc' => 'Experience a smooth and successful closing process, guided by our legal experts who oversee every detail from contract to completion.' ],
            ];
            foreach ( $valuation_services as $s ) :
            ?>
            <div class="service-feature-card">
                <div class="sf-icon"><?php echo estatein_icon( $s['icon'] ); ?></div>
                <h3 class="sf-title"><?php echo esc_html( $s['title'] ); ?></h3>
                <p class="sf-desc"><?php echo esc_html( $s['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="service-cta-box">
            <div>
                <h3>Unlock the Value of Your Property Today</h3>
                <p>Ready to unlock the value of your property? Join the thousands of sellers who've had a successful experience with Estatein's Unlock Property Value service. Let's embark on this journey together.</p>
            </div>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</section>

<!-- ============================================================
     EFFORTLESS PROPERTY MANAGEMENT
     ============================================================ -->
<section class="service-section section-alt" id="management">
    <div class="container">
        <div class="service-section-header">
            <p class="section-tag">Property Management</p>
            <h2 class="section-title">Effortless Property Management</h2>
            <p class="section-desc">Owning a property should be a joy, not a burden. Estatein's property management service is designed to take the stress out of ownership, offering a comprehensive suite of services tailored to your needs.</p>
        </div>

        <div class="service-features-grid">
            <?php
            $pm_services = [
                [ 'icon' => 'trust',    'title' => 'Tenant Management',   'desc' => 'We handle everything from tenant screening and placement to rent collection and lease renewals, ensuring your property is always well-occupied.' ],
                [ 'icon' => 'settings', 'title' => 'Maintenance Ease',    'desc' => 'Our maintenance team promptly addresses repairs, ensures inspections are conducted, and keeps your property in top condition.' ],
                [ 'icon' => 'heart',    'title' => 'Financial Peace of Mind', 'desc' => 'Rest easy knowing your financials are in safe hands. We manage rent collection, provide detailed financial statements, and handle tax documentation.' ],
                [ 'icon' => 'users',    'title' => 'Legal Guardian',       'desc' => 'Our legal team protects your interests by ensuring compliance with local housing laws and handling any legal matters that may arise.' ],
            ];
            foreach ( $pm_services as $s ) :
            ?>
            <div class="service-feature-card">
                <div class="sf-icon"><?php echo estatein_icon( $s['icon'] ); ?></div>
                <h3 class="sf-title"><?php echo esc_html( $s['title'] ); ?></h3>
                <p class="sf-desc"><?php echo esc_html( $s['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="service-cta-box">
            <div>
                <h3>Experience Effortless Property Management</h3>
                <p>Ready to experience the benefits of professional property management? Trust Estatein to handle the details while you enjoy the rewards. Contact us for a personalised consultation.</p>
            </div>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</section>

<!-- ============================================================
     SMART INVESTMENTS
     ============================================================ -->
<section class="service-section" id="investments">
    <div class="container">
        <div class="service-section-header">
            <p class="section-tag">Smart Investments</p>
            <h2 class="section-title">Smart Investments, Informed Decisions</h2>
            <p class="section-desc">Building a real estate portfolio requires knowledge, expertise, and strategic planning. At Estatein, we provide data-driven investment advice to help you make the best decisions for your financial future.</p>
        </div>

        <div class="service-features-grid">
            <?php
            $inv_services = [
                [ 'icon' => 'chart',   'title' => 'Market Insight',          'desc' => 'Stay ahead with in-depth market analyses, property trend reports, and data-driven insights to identify the best investment opportunities.' ],
                [ 'icon' => 'invest',  'title' => 'ROI Government',          'desc' => 'Maximise your returns with our ROI analysis and financial modelling, ensuring every investment is backed by solid financial reasoning.' ],
                [ 'icon' => 'compass', 'title' => 'Customised Strategies',   'desc' => 'Receive a personalised investment strategy built around your financial goals, risk tolerance, and investment horizon.' ],
                [ 'icon' => 'brain',   'title' => 'Diversification Mastery', 'desc' => 'Learn how to spread risk effectively across different property types and locations to build a resilient, high-performing portfolio.' ],
            ];
            foreach ( $inv_services as $s ) :
            ?>
            <div class="service-feature-card">
                <div class="sf-icon"><?php echo estatein_icon( $s['icon'] ); ?></div>
                <h3 class="sf-title"><?php echo esc_html( $s['title'] ); ?></h3>
                <p class="sf-desc"><?php echo esc_html( $s['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="service-cta-box">
            <div>
                <h3>Unlock Your Investment Potential</h3>
                <p>Embark on your investment journey with Estatein. Whether you're a first-time investor or a seasoned one, our smart investment strategies and expert guidance will help you achieve your financial aspirations.</p>
            </div>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Learn More</a>
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
