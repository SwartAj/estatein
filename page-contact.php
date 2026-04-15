<?php
/**
 * Template Name: Contact
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
                <p class="section-tag">Get In Touch</p>
                <h1>Get in Touch with Estatein</h1>
                <p>Welcome to Estatein's Contact Us page. We're here to help you with any questions, concerns, or feedback you may have. Whether you're looking to buy, sell, rent, or simply explore real estate options — reach out to us today.</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT INFO CARDS -->
<section class="section section-alt">
    <div class="container">
        <div class="contact-info-grid">
            <div class="contact-info-card">
                <div class="ci-icon"><?php echo estatein_icon( 'email' ); ?></div>
                <div class="ci-label">Email Address</div>
                <div class="ci-value">info@estatein.com</div>
            </div>
            <div class="contact-info-card">
                <div class="ci-icon"><?php echo estatein_icon( 'phone' ); ?></div>
                <div class="ci-label">Phone Number</div>
                <div class="ci-value">+1 (555) 123-4567</div>
            </div>
            <div class="contact-info-card">
                <div class="ci-icon"><?php echo estatein_icon( 'social' ); ?></div>
                <div class="ci-label">Social Media</div>
                <div class="ci-value">@Estatein</div>
            </div>
            <div class="contact-info-card">
                <div class="ci-icon"><?php echo estatein_icon( 'globe' ); ?></div>
                <div class="ci-label">Social Handles</div>
                <div class="ci-value">Instagram · LinkedIn · Facebook</div>
            </div>
        </div>
    </div>
</section>

<!-- LET'S CONNECT FORM -->
<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1.6fr;gap:60px;align-items:start">
            <div>
                <p class="section-tag">Let's Connect</p>
                <h2 class="section-title">Let's Connect</h2>
                <p class="section-desc">We're excited to connect with you and learn how we can serve your real estate needs. Our team is ready to answer your questions, provide guidance, and help you explore the possibilities.</p>
            </div>
            <div class="form-box">
                <form class="form-grid estatein-form" method="post" action="#">
                    <?php wp_nonce_field( 'estatein_contact', '_contact_nonce' ); ?>

                    <div class="form-group">
                        <label for="c-fname">First Name</label>
                        <input type="text" id="c-fname" name="first_name" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="c-lname">Last Name</label>
                        <input type="text" id="c-lname" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="c-email">Email</label>
                        <input type="email" id="c-email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="c-phone">Phone</label>
                        <input type="tel" id="c-phone" name="phone" placeholder="Enter Your Phone">
                    </div>
                    <div class="form-group">
                        <label for="c-inquiry">Inquiry Type</label>
                        <select id="c-inquiry" name="inquiry_type">
                            <option value="">Select Inquiry Type</option>
                            <option>Buying a Property</option>
                            <option>Selling a Property</option>
                            <option>Property Management</option>
                            <option>Investment Advice</option>
                            <option>General Enquiry</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="c-how">How Did You Hear About Us?</label>
                        <select id="c-how" name="how_heard">
                            <option value="">Select</option>
                            <option>Google Search</option>
                            <option>Social Media</option>
                            <option>Referral</option>
                            <option>Advertisement</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group span2">
                        <label for="c-message">Message</label>
                        <textarea id="c-message" name="message" placeholder="Enter your message here…"></textarea>
                    </div>
                    <label class="form-check">
                        <input type="checkbox" name="agree_privacy" required>
                        I agree with <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                    </label>
                    <div class="span2">
                        <button type="submit" class="btn btn-primary btn-lg">Send Your Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- OFFICE LOCATIONS -->
<section class="section section-alt" id="offices">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our Offices</p>
            <h2 class="section-title">Discover Our Office Locations</h2>
            <p class="section-desc">Estatein is here to serve you across multiple locations. Whether you're looking for a local expert or want to visit our offices in person, find a location near you.</p>
        </div>

        <!-- Tabs -->
        <div class="offices-tabs">
            <button class="offices-tab active" data-tab="hq-pane">Head Quarters</button>
            <button class="offices-tab" data-tab="regional-pane">Regional</button>
            <button class="offices-tab" data-tab="international-pane">International</button>
        </div>

        <!-- HQ Pane -->
        <div class="office-pane active" id="hq-pane">
            <div class="offices-grid">
                <div class="office-card">
                    <span class="office-badge">Head Quarters</span>
                    <h3 class="office-address">123 Estatein Plaza, City Center, Metropolis</h3>
                    <div class="office-meta">
                        <span class="office-meta-item"><?php echo estatein_icon( 'phone' ); ?> +1 (555) 123-4567</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'clock' ); ?> Mon–Fri 9 AM–6 PM</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'globe' ); ?> info@estatein.com</span>
                    </div>
                    <p class="office-desc">Our flagship office at the heart of Metropolis. Come visit us for a personalised consultation with our senior agents and leadership team.</p>
                    <div class="office-actions">
                        <a href="tel:+15551234567" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'phone' ); ?> Call Us</a>
                        <a href="mailto:info@estatein.com" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'email' ); ?> Email Us</a>
                        <a href="#" class="btn btn-primary btn-sm"><?php echo estatein_icon( 'map' ); ?> Get Directions</a>
                    </div>
                </div>
                <div class="office-card">
                    <span class="office-badge">Regional Office</span>
                    <h3 class="office-address">456 Urban Plaza, Downtown District, Metropolis</h3>
                    <div class="office-meta">
                        <span class="office-meta-item"><?php echo estatein_icon( 'phone' ); ?> +1 (555) 987-6543</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'clock' ); ?> Mon–Fri 9 AM–6 PM</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'globe' ); ?> regional@estatein.com</span>
                    </div>
                    <p class="office-desc">Our downtown office specialises in urban residential and commercial properties. Our team of experts is ready to help you navigate the city property market.</p>
                    <div class="office-actions">
                        <a href="tel:+15559876543" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'phone' ); ?> Call Us</a>
                        <a href="mailto:regional@estatein.com" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'email' ); ?> Email Us</a>
                        <a href="#" class="btn btn-primary btn-sm"><?php echo estatein_icon( 'map' ); ?> Get Directions</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Regional Pane -->
        <div class="office-pane" id="regional-pane" style="display:none">
            <div class="offices-grid">
                <div class="office-card">
                    <span class="office-badge">Regional Office</span>
                    <h3 class="office-address">789 West Side Blvd, Westgate, Metropolis</h3>
                    <div class="office-meta">
                        <span class="office-meta-item"><?php echo estatein_icon( 'phone' ); ?> +1 (555) 246-8135</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'clock' ); ?> Mon–Fri 9 AM–5 PM</span>
                    </div>
                    <p class="office-desc">Serving the western suburbs with expertise in residential and luxury property sales.</p>
                    <div class="office-actions">
                        <a href="#" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'phone' ); ?> Call Us</a>
                        <a href="#" class="btn btn-primary btn-sm"><?php echo estatein_icon( 'map' ); ?> Get Directions</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- International Pane -->
        <div class="office-pane" id="international-pane" style="display:none">
            <div class="offices-grid">
                <div class="office-card">
                    <span class="office-badge">International</span>
                    <h3 class="office-address">10 Global Tower, International District</h3>
                    <div class="office-meta">
                        <span class="office-meta-item"><?php echo estatein_icon( 'phone' ); ?> +44 (20) 7946-0958</span>
                        <span class="office-meta-item"><?php echo estatein_icon( 'clock' ); ?> Mon–Fri 8 AM–5 PM GMT</span>
                    </div>
                    <p class="office-desc">Our international office for overseas property enquiries and cross-border real estate investments.</p>
                    <div class="office-actions">
                        <a href="#" class="btn btn-secondary btn-sm"><?php echo estatein_icon( 'phone' ); ?> Call Us</a>
                        <a href="#" class="btn btn-primary btn-sm"><?php echo estatein_icon( 'map' ); ?> Get Directions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO GALLERY — Explore Estatein's World -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our World</p>
            <h2 class="section-title">Explore Estatein's World</h2>
            <p class="section-desc">Step inside Estatein's world through our gallery. From our vibrant offices to the stunning properties we manage, get a glimpse of the Estatein experience.</p>
        </div>
        <div class="photo-gallery">
            <?php for ( $i = 0; $i < 6; $i++ ) : ?>
            <div class="photo-item">
                <div class="photo-placeholder"><?php echo [ '🏢', '👥', '🤝', '🏠', '📋', '🌆' ][ $i ]; ?></div>
            </div>
            <?php endfor; ?>
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

<!-- Office Tabs JS -->
<script>
(function () {
    var tabs  = document.querySelectorAll('.offices-tab');
    var panes = document.querySelectorAll('.office-pane');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var id = this.dataset.tab;

            tabs.forEach(function (t) { t.classList.remove('active'); });
            panes.forEach(function (p) { p.style.display = 'none'; });

            this.classList.add('active');

            var pane = document.getElementById(id);
            if (pane) pane.style.display = 'block';
        });
    });
})();
</script>

<?php get_footer(); ?>
