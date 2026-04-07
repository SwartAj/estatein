<?php
/**
 * Template Name: About Us
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
                <p class="section-tag">Our Journey</p>
                <h1>Our Journey</h1>
                <p>Our story is one of continuous growth and success. We started as a small real estate agency with big dreams, and today, we've helped thousands of individuals and families find their perfect properties. Our journey has been marked by dedication, innovation, and an unwavering commitment to excellence.</p>
                <div class="stats-bar" style="margin-top:28px">
                    <div class="stat-item"><div class="stat-number">200+</div><div class="stat-label">Happy Customers</div></div>
                    <div class="stat-item"><div class="stat-number">10k+</div><div class="stat-label">Properties For Sale</div></div>
                    <div class="stat-item"><div class="stat-number">16+</div><div class="stat-label">Years of Experience</div></div>
                </div>
            </div>
            <div class="page-hero-img-wrap">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="width:360px;height:380px;border-radius:var(--radius-xl);overflow:hidden;">
                        <?php the_post_thumbnail( 'large', [ 'alt' => 'About Estatein', 'style' => 'width:100%;height:100%;object-fit:cover;' ] ); ?>
                    </div>
                <?php else : ?>
                    <div style="width:360px;height:380px;background:linear-gradient(135deg,#1a1035,#2d1b6b);border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:80px">🏡</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- OUR VALUES -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our Values</p>
            <h2 class="section-title">Our Values</h2>
            <p class="section-desc">Our story is one of continuous growth and success. We started as a small real estate agency and today we've helped thousands find their perfect properties.</p>
        </div>
        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon"><?php echo estatein_icon( 'trust' ); ?></div>
                <h3 class="value-title">Trust</h3>
                <p class="value-desc">Trust is the cornerstone of every successful real estate transaction. At Estatein, we prioritise honesty, transparency, and open communication.</p>
            </div>
            <div class="value-item">
                <div class="value-icon"><?php echo estatein_icon( 'star' ); ?></div>
                <h3 class="value-title">Excellence</h3>
                <p class="value-desc">We set the bar for excellence in real estate. From our meticulous attention to detail to our commitment to providing you the best properties, we strive for perfection.</p>
            </div>
            <div class="value-item">
                <div class="value-icon"><?php echo estatein_icon( 'users' ); ?></div>
                <h3 class="value-title">Client-Centric</h3>
                <p class="value-desc">Your dreams and needs are at the centre of our universe. We listen, understand, and tailor our services to meet your unique requirements and exceed your expectations.</p>
            </div>
            <div class="value-item">
                <div class="value-icon"><?php echo estatein_icon( 'heart' ); ?></div>
                <h3 class="value-title">Our Commitment</h3>
                <p class="value-desc">We are dedicated to providing you with the highest level of service, professionalism, and market expertise. Your satisfaction is our ultimate goal.</p>
            </div>
        </div>
    </div>
</section>

<!-- OUR ACHIEVEMENTS -->
<section class="section" id="work">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our Achievements</p>
            <h2 class="section-title">Our Achievements</h2>
            <p class="section-desc">Our story is one of continuous growth and success. We started as a small real estate trading, determined to create a real estate trading platform that prioritised customers and simplified their lives.</p>
        </div>
        <div class="achievements-grid">
            <div class="achievement-card">
                <div class="achievement-num">3+ Years</div>
                <h3 class="achievement-title">Years of Excellence</h3>
                <p class="achievement-desc">With over 3 years in the industry, Estatein's journey of knowledge, determination and expertise in navigating the real estate market gives us our unparalleled advantages.</p>
            </div>
            <div class="achievement-card">
                <div class="achievement-num">Happy Clients</div>
                <h3 class="achievement-title">Happy Clients</h3>
                <p class="achievement-desc">Our greatest achievement is the satisfaction of our clients. With a 98% client satisfaction rate, we take pride in turning real estate dreams into reality — one happy client at a time.</p>
            </div>
            <div class="achievement-card">
                <div class="achievement-num">Industry Recognition</div>
                <h3 class="achievement-title">Industry Recognition</h3>
                <p class="achievement-desc">Estatein's commitment to excellence has earned us prestigious industry awards and recognition, a testament to our dedication to quality and innovation in real estate.</p>
            </div>
        </div>
    </div>
</section>

<!-- NAVIGATING THE ESTATEIN EXPERIENCE -->
<section class="section section-alt" id="process">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our Process</p>
            <h2 class="section-title">Navigating the Estatein Experience</h2>
            <p class="section-desc">At Estatein, we've streamlined the property journey into a simple, clear process to help you find and secure your dream property with ease. Step-by-step guide to your new home.</p>
        </div>
        <div class="steps-grid">
            <?php
            $steps = [
                [ 'num' => 'Step 01', 'title' => 'Discover a World of Possibilities', 'desc' => 'Your journey begins with exploring our extensive property listings. Use our filters and search features to find properties that match your preferences.' ],
                [ 'num' => 'Step 02', 'title' => 'Narrowing Down Your Choices', 'desc' => 'Once you\'ve found properties that catch your eye, save them to your favourites list and schedule viewings at your convenience.' ],
                [ 'num' => 'Step 03', 'title' => 'Personalised Guidance', 'desc' => 'Our real estate experts are here to provide personalised guidance. Receive expert advice, assist you in negotiations, and guide you through the closing process.' ],
                [ 'num' => 'Step 04', 'title' => 'See it for Yourself', 'desc' => 'Arrange property viewings and experience the properties firsthand. Our agents will accompany you to ensure you get a comprehensive understanding of each property.' ],
                [ 'num' => 'Step 05', 'title' => 'Making Informed Decisions', 'desc' => 'Before making an offer, we ensure you have all the information you need. Our agents provide detailed property reports, legal guidance, and expert market analysis.' ],
                [ 'num' => 'Step 06', 'title' => 'Getting the Best Deal', 'desc' => 'Our skilled negotiators will work tirelessly to secure the best deal for you. From price negotiations to contingency clauses, we handle every detail to your advantage.' ],
            ];
            foreach ( $steps as $step ) :
            ?>
            <div class="step-card">
                <span class="step-num"><?php echo esc_html( $step['num'] ); ?></span>
                <h3 class="step-title"><?php echo esc_html( $step['title'] ); ?></h3>
                <p class="step-desc"><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- MEET THE TEAM -->
<section class="section" id="team">
    <div class="container">
        <div class="section-header">
            <p class="section-tag">Our Team</p>
            <h2 class="section-title">Meet the Estatein Team</h2>
            <p class="section-desc">At Estatein, our success is driven by the dedication and expertise of our team. Get to know the passionate individuals who make our real estate dreams a reality.</p>
        </div>
        <div class="team-grid">
            <?php
            $team_query = new WP_Query( [ 'post_type' => 'team_member', 'posts_per_page' => 4 ] );
            if ( $team_query->have_posts() ) :
                while ( $team_query->have_posts() ) : $team_query->the_post();
                    $role     = estatein_meta( 'team_role' )     ?: 'Real Estate Agent';
                    $email    = estatein_meta( 'team_email' );
                    $linkedin = estatein_meta( 'team_linkedin' );
            ?>
            <div class="team-card">
                <div class="team-photo">
                    <?php if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'team-photo', [ 'alt' => get_the_title() ] );
                    else :
                        $init = strtoupper( substr( get_the_title(), 0, 1 ) );
                    ?>
                        <div class="team-photo-init"><?php echo esc_html( $init ); ?></div>
                    <?php endif; ?>
                </div>
                <div class="team-name"><?php the_title(); ?></div>
                <div class="team-role"><?php echo esc_html( $role ); ?></div>
                <div class="team-socials">
                    <?php if ( $email ) : ?>
                        <a href="mailto:<?php echo esc_attr( $email ); ?>" class="team-social-btn" aria-label="Email"><?php echo estatein_icon( 'email' ); ?></a>
                    <?php endif; ?>
                    <?php if ( $linkedin ) : ?>
                        <a href="<?php echo esc_url( $linkedin ); ?>" class="team-social-btn" aria-label="LinkedIn" target="_blank" rel="noopener"><?php echo estatein_icon( 'linkedin' ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $fallback_team = [
                    [ 'name' => 'Max Mitchell',   'role' => 'Founder',                'init' => 'M' ],
                    [ 'name' => 'Sarah Johnson',  'role' => 'Chief Real Estate Agent', 'init' => 'S' ],
                    [ 'name' => 'David Brown',    'role' => 'Head of Property Management', 'init' => 'D' ],
                    [ 'name' => 'Michael Turner', 'role' => 'Legal Advisor',           'init' => 'M' ],
                ];
                foreach ( $fallback_team as $m ) :
            ?>
            <div class="team-card">
                <div class="team-photo">
                    <div class="team-photo-init"><?php echo esc_html( $m['init'] ); ?></div>
                </div>
                <div class="team-name"><?php echo esc_html( $m['name'] ); ?></div>
                <div class="team-role"><?php echo esc_html( $m['role'] ); ?></div>
                <div class="team-socials">
                    <a href="mailto:#" class="team-social-btn" aria-label="Email"><?php echo estatein_icon( 'email' ); ?></a>
                    <a href="#" class="team-social-btn" aria-label="LinkedIn"><?php echo estatein_icon( 'linkedin' ); ?></a>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- OUR VALUED CLIENTS -->
<section class="section section-alt" id="clients">
    <div class="container">
        <div class="section-header-row">
            <div>
                <p class="section-tag">Our Clients</p>
                <h2 class="section-title">Our Valued Clients</h2>
                <p class="section-desc">At Estatein, we have had the privilege of working with a diverse range of clients across various industries. From startups to established corporations, our real estate solutions have helped businesses of all sizes find their ideal properties.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button class="carousel-btn prev"><?php echo estatein_icon( 'arrow-l' ); ?></button>
                <button class="carousel-btn next"><?php echo estatein_icon( 'arrow-r' ); ?></button>
            </div>
        </div>
        <div class="clients-grid">
            <?php
            $clients = [
                [ 'name' => 'ABC Corporation', 'badge' => 'Gold', 'domain' => 'Canada', 'category' => 'Commercial Real Estate', 'note' => 'Luxury Home Headquarters', 'quote' => 'Estatein\'s expertise in commercial real estate is unparalleled. Their ability to identify the right properties for our expansion has been invaluable to our business growth.' ],
                [ 'name' => 'GreenTech Enterprises', 'badge' => 'VIP', 'domain' => 'USA', 'category' => 'Commercial Real Estate', 'note' => 'Real Estate', 'quote' => 'Estatein\'s dedication to finding the perfect location and facilities helped us establish a groundbreaking brand presence. We are now ready for our growth.' ],
            ];
            foreach ( $clients as $c ) :
            ?>
            <div class="client-card">
                <span class="client-badge"><?php echo esc_html( $c['badge'] ); ?></span>
                <div class="client-name"><?php echo esc_html( $c['name'] ); ?></div>
                <div class="client-meta">
                    <span class="client-meta-item"><strong>Domain:</strong> <?php echo esc_html( $c['domain'] ); ?></span>
                    <span class="client-meta-item"><strong>Category:</strong> <?php echo esc_html( $c['category'] ); ?></span>
                </div>
                <p class="client-quote">"<?php echo esc_html( $c['quote'] ); ?>"</p>
            </div>
            <?php endforeach; ?>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;padding-top:16px;border-top:1px solid var(--border)">
            <span class="text-muted" style="font-size:13px">1 of 10</span>
            <div style="display:flex;gap:8px">
                <button class="carousel-btn prev"><?php echo estatein_icon( 'arrow-l' ); ?></button>
                <button class="carousel-btn next"><?php echo estatein_icon( 'arrow-r' ); ?></button>
            </div>
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
