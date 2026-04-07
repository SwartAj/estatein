/* ============================================================
   ESTATEIN — Main JavaScript
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

  // ============================================================
  // MOBILE MENU
  // ============================================================
  var hamburger = document.querySelector('.hamburger');
  var mobileMenu = document.querySelector('.mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      var open = mobileMenu.classList.toggle('active');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', String(open));
    });
    // Close on outside click
    document.addEventListener('click', function (e) {
      if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.remove('active');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
    // Close when a menu link is clicked
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('active');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // ============================================================
  // FAQ ACCORDION
  // ============================================================
  var faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(function (item) {
    var question = item.querySelector('.faq-question');
    if (!question) return;

    question.addEventListener('click', function () {
      var isActive = item.classList.contains('active');
      faqItems.forEach(function (i) { i.classList.remove('active'); });
      if (!isActive) item.classList.add('active');
    });
  });

  // ============================================================
  // GALLERY — thumbnail swap on property detail page
  // ============================================================
  var mainImg = document.querySelector('.gallery-main img');
  var thumbs  = document.querySelectorAll('.gallery-thumb img');

  if (mainImg && thumbs.length) {
    thumbs.forEach(function (thumb) {
      thumb.parentElement.addEventListener('click', function () {
        var prev = mainImg.src;
        mainImg.src = thumb.src;
        mainImg.alt = thumb.alt;
        thumb.src = prev;
      });
    });
  }

  // ============================================================
  // OFFICE TABS (Contact page)
  // ============================================================
  var officeTabs     = document.querySelectorAll('.offices-tab');
  var officeContents = document.querySelectorAll('.office-pane');

  officeTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var target = this.dataset.tab;
      officeTabs.forEach(function (t) { t.classList.remove('active'); });
      officeContents.forEach(function (c) { c.classList.remove('active'); });
      this.classList.add('active');
      var pane = document.getElementById(target);
      if (pane) pane.classList.add('active');
    });
  });

  // ============================================================
  // ANIMATE-ON-SCROLL (cards fade up)
  // ============================================================
  if ('IntersectionObserver' in window) {
    var targets = document.querySelectorAll(
      '.property-card, .testimonial-card, .team-card, .service-feature-card, .achievement-card, .step-card, .client-card, .office-card'
    );

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity  = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });

    targets.forEach(function (el) {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(18px)';
      el.style.transition = 'opacity .5s ease, transform .5s ease';
      observer.observe(el);
    });
  }

  // ============================================================
  // COUNTER ANIMATION
  // ============================================================
  function animateCounter(el) {
    var raw    = el.textContent.trim();
    var num    = parseInt(raw.replace(/\D/g, ''), 10);
    var suffix = raw.replace(/[0-9]/g, '');
    if (isNaN(num)) return;
    var current = 0;
    var step    = Math.ceil(num / 60);
    var timer   = setInterval(function () {
      current = Math.min(current + step, num);
      el.textContent = current.toLocaleString() + suffix;
      if (current >= num) clearInterval(timer);
    }, 28);
  }

  if ('IntersectionObserver' in window) {
    var counters = document.querySelectorAll('.stat-number');
    var cObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          cObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.6 });
    counters.forEach(function (c) { cObserver.observe(c); });
  }

  // ============================================================
  // SMOOTH SCROLL for anchor links
  // ============================================================
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var href = this.getAttribute('href');
      if (href === '#') return;
      var target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ============================================================
  // FORM — client-side feedback (no page reload)
  // ============================================================
  document.querySelectorAll('.estatein-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var required = form.querySelectorAll('[required]');
      var valid    = true;

      required.forEach(function (f) {
        f.style.borderColor = '';
        if (!f.value.trim()) {
          f.style.borderColor = '#ef4444';
          valid = false;
        }
      });

      if (!valid) return;

      var btn = form.querySelector('[type="submit"]');
      var orig = btn ? btn.textContent : '';
      if (btn) { btn.textContent = 'Sending…'; btn.disabled = true; }

      // Simulated send – replace with real AJAX / WPForms / CF7 if needed
      setTimeout(function () {
        if (btn) {
          btn.textContent = 'Message Sent!';
          form.reset();
          setTimeout(function () {
            btn.textContent = orig;
            btn.disabled = false;
          }, 3000);
        }
      }, 1200);
    });
  });

  // ============================================================
  // PROPERTY FILTER — AJAX (Properties page)
  // ============================================================
  var filterForm = document.getElementById('property-filter-form');
  if (filterForm && typeof estateinData !== 'undefined') {
    filterForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var data = new FormData(filterForm);
      data.append('action', 'filter_properties');
      data.append('nonce',  estateinData.nonce);

      var grid = document.getElementById('properties-grid');
      if (grid) grid.style.opacity = '0.4';

      fetch(estateinData.ajaxurl, { method: 'POST', body: data })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res.success && grid) {
            grid.innerHTML = res.data.html;
            grid.style.opacity = '1';
          }
        })
        .catch(function () { if (grid) grid.style.opacity = '1'; });
    });

    // Live filter on select change
    filterForm.querySelectorAll('select').forEach(function (sel) {
      sel.addEventListener('change', function () { filterForm.dispatchEvent(new Event('submit')); });
    });
  }

});
