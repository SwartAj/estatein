<!-- CTA section is included per-template, not here -->

<!-- ============================================================
     SITE FOOTER
     ============================================================ -->
<footer class="site-footer" role="contentinfo">
    <div class="footer-top">

        <!-- Brand + Newsletter -->
        <div class="footer-brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                <?php echo estatein_logo_svg(); ?>
            </a>
            <p class="footer-tagline">Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.</p>
            <form class="footer-newsletter" action="#" method="post">
                <?php wp_nonce_field( 'estatein_newsletter', '_newsletter_nonce' ); ?>
                <input type="email" name="nl_email" placeholder="Enter Your Email" aria-label="Email address" required>
                <button type="submit" aria-label="Subscribe">
                    <?php echo estatein_icon( 'send' ); ?>
                </button>
            </form>
        </div>

        <!-- Home Links -->
        <div class="footer-col">
            <h4>Home</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#hero">Hero Section</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features">Features</a></li>
                <li><a href="<?php echo esc_url( home_url( '/properties' ) ); ?>">Properties</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#testimonials">Testimonials</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq">FAQs</a></li>
            </ul>
        </div>

        <!-- About Links -->
        <div class="footer-col">
            <h4>About Us</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">Our Story</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>#team">Our Team</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>#work">Our Work</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>#process">How We Work</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>#clients">Our Clients</a></li>
            </ul>
        </div>

        <!-- Properties Links -->
        <div class="footer-col">
            <h4>Properties</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/properties' ) ); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url( home_url( '/properties' ) ); ?>">Categories</a></li>
            </ul>
        </div>

        <!-- Services Links -->
        <div class="footer-col">
            <h4>Services</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>#valuation">Valuation Mastery</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>#marketing">Strategic Marketing</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>#negotiation">Negotiation Wizardry</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>#closing">Closing Success</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>#management">Property Management</a></li>
            </ul>
        </div>

        <!-- Contact Links -->
        <div class="footer-col">
            <h4>Contact Us</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact Form</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>#offices">Our Offices</a></li>
            </ul>
        </div>

    </div><!-- .footer-top -->

    <div class="footer-bottom">
        <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Estatein. All Rights Reserved.</p>
        <a href="#">Terms &amp; Conditions</a>
        <div class="social-links">
            <a href="#" class="social-link" aria-label="Facebook"><?php echo estatein_icon( 'facebook' ); ?></a>
            <a href="#" class="social-link" aria-label="Twitter"><?php echo estatein_icon( 'twitter' ); ?></a>
            <a href="#" class="social-link" aria-label="LinkedIn"><?php echo estatein_icon( 'linkedin' ); ?></a>
            <a href="#" class="social-link" aria-label="YouTube"><?php echo estatein_icon( 'youtube' ); ?></a>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
