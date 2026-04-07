# Estatein — WordPress Theme Documentation

## Overview

Estatein is a fully custom WordPress theme built for a modern real estate company. The theme was developed from scratch using PHP, CSS, and JavaScript — without reliance on page builders — to demonstrate clean, maintainable WordPress development practices.

---

## Development Approach

### Theme Architecture

The theme follows standard WordPress template hierarchy:

- `style.css` — Theme registration header
- `functions.php` — Theme setup, asset enqueueing, Custom Post Types, taxonomies, ACF field registration, and helper functions
- `header.php` / `footer.php` — Reusable site-wide header and footer
- `front-page.php` — Home page template
- `page-about.php` — About Us page (Template Name: About Us)
- `page-properties.php` — Properties listing page (Template Name: Properties)
- `page-services.php` — Services page (Template Name: Services)
- `page-contact.php` — Contact page (Template Name: Contact)
- `single-property.php` — Individual property detail page
- `archive-property.php` — Property CPT archive
- `404.php` — Error page
- `assets/css/main.css` — All styles via CSS custom properties
- `assets/js/main.js` — Vanilla JS for interactivity

### Design System

The design uses CSS custom properties (variables) defined in `:root`, making the colour scheme and spacing easy to update globally:

- Background: `#141414`
- Accent/Primary: `#7C3AED` (purple)
- Typography: Inter (Google Fonts)

### Custom Post Types

Two CPTs were registered in `functions.php`:

1. **Property** (`property`) — For all property listings, with a custom taxonomy for Property Type and Location
2. **Team Member** (`team_member`) — For the About page team section
3. **Testimonial** (`testimonial`) — For client testimonials displayed on the Home and About pages

### Advanced Custom Fields (ACF)

ACF field groups are registered programmatically in `functions.php` via `acf_add_local_field_group()`, which means field definitions live in code (version-controllable) rather than the database. Fields include:

- Property: price, location, bedrooms, bathrooms, area, badge, gallery, key features, pricing details
- Team Member: job title, Twitter URL, LinkedIn URL
- Testimonial: author name, location, star rating, avatar

A fallback to `get_post_meta()` is included via the `estatein_meta()` helper, so the theme works with or without ACF active.

### Responsiveness

CSS Grid and Flexbox are used throughout with `clamp()` for fluid typography. Breakpoints at 1024px, 768px, and 480px adjust all multi-column layouts to single-column on mobile. No external CSS frameworks are used.

### Performance

- Google Fonts loaded with `display=swap` to prevent render blocking
- Images use WordPress's built-in `add_image_size()` to serve appropriately sized images
- Lazy loading is handled by LiteSpeed Cache plugin
- CSS and JS minification handled by LiteSpeed Cache

### SEO

- Theme supports `title-tag` via `add_theme_support()`
- All output is escaped using `esc_html()`, `esc_url()`, `esc_attr()` throughout
- Images include descriptive `alt` attributes
- Semantic HTML5 elements used (`header`, `main`, `footer`, `article`, `nav`, `section`)
- Meta tags and sitemap managed by Rank Math SEO plugin

### Forms

Contact and inquiry forms are built as custom HTML forms with:
- Client-side validation via JavaScript
- Server-side nonce verification via `wp_nonce_field()` / `check_ajax_referer()`
- No plugin dependency required

---

## Plugins Used

| Plugin | Purpose |
|---|---|
| Advanced Custom Fields (free) | Programmatic property meta fields |
| LiteSpeed Cache (free) | CSS/JS minification, lazy loading, caching |
| Rank Math SEO (free) | Meta tags, Open Graph, XML sitemap, schema |

---

## Local Setup Instructions

1. Install [Local by Flywheel](https://localwp.com/)
2. Create a new site
3. Copy the `estatein` theme folder to `wp-content/themes/`
4. Activate the theme via **Appearance → Themes**
5. Install the three plugins listed above
6. Create the following pages and assign templates:

| Page | Template |
|---|---|
| Home | Default |
| About Us | About Us |
| Properties | Properties |
| Services | Services |
| Contact | Contact |

7. Go to **Settings → Reading** → set Static Front Page to "Home"
8. Go to **Settings → Permalinks** → save (to flush rewrite rules for CPT URLs)
9. Add sample Properties, Team Members, and Testimonials via the WordPress dashboard

---

## Notes

- All PHP output is sanitised and escaped to prevent XSS
- The theme is compatible with WordPress 6.0+, PHP 8.0+
- No jQuery dependency — all JavaScript is vanilla ES5 for maximum compatibility
