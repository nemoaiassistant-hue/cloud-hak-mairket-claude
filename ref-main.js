/* Mairket — client JS (WP) */
(function () {
  'use strict';

  /* ---------- Sticky header shadow on scroll ---------- */
  const header = document.getElementById('site-header');
  const onScroll = () => {
    if (!header) return;
    if (window.scrollY > 12) header.classList.add('is-scrolled');
    else header.classList.remove('is-scrolled');
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- Reveal animation ---------- */
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('is-visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('is-visible'));
  }

  /* ---------- Form submission via WP admin-ajax ---------- */
  const form = document.getElementById('intake-form');
  const status = document.getElementById('form-status');
  if (form && window.MktData && window.MktData.ajax_url) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      // Honeypot
      const hp = form.elements.namedItem('website_url_hp');
      if (hp && hp.value) return; // silently drop bots

      // Required validation
      const required = form.querySelectorAll('[required]');
      let missing = [];
      required.forEach((el) => {
        if (!el.value || !el.value.trim()) missing.push(el);
      });
      if (missing.length) {
        status.textContent = 'Please complete the required fields before sending.';
        status.className = 'form-status error';
        missing[0].focus();
        return;
      }

      // Services check (need at least one)
      const services = form.querySelectorAll('input[name="services[]"]:checked');
      if (!services.length) {
        status.textContent = 'Please choose at least one service so we know how to help.';
        status.className = 'form-status error';
        return;
      }

      // Build FormData for admin-ajax
      const fd = new FormData(form);
      fd.append('action', 'mkt_intake');
      fd.append('nonce', window.MktData.nonce);

      // Disable submit button during request
      const btn = form.querySelector('button[type="submit"]');
      const btnText = btn ? btn.textContent : '';
      if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }
      status.textContent = '';
      status.className = 'form-status';

      fetch(window.MktData.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: fd,
      })
        .then((r) => r.json())
        .then((res) => {
          if (res && res.success) {
            status.textContent = res.message || 'Thanks — your brief was received. We will respond within one business day.';
            status.className = 'form-status success';
            form.reset();
            window.scrollTo({ top: status.getBoundingClientRect().top + window.scrollY - 200, behavior: 'smooth' });
          } else {
            status.textContent = (res && res.message) || 'Something went wrong. Please try again or email us directly.';
            status.className = 'form-status error';
          }
        })
        .catch(() => {
          status.textContent = 'Network error. Please try again or email us directly.';
          status.className = 'form-status error';
        })
        .finally(() => {
          if (btn) { btn.disabled = false; btn.textContent = btnText; }
        });
    });
  }

  /* ---------- Smooth scroll for anchor links ---------- */
  document.querySelectorAll('a[href*="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const href = a.getAttribute('href');
      // Only smooth-scroll for same-page anchors
      const hashIdx = href.indexOf('#');
      if (hashIdx === -1) return;
      const id = href.slice(hashIdx);
      if (id.length < 2) return;
      // Only handle if target exists on this page
      const target = document.querySelector(id);
      if (!target) return;
      // If the link is to a different path, let the browser navigate normally
      const url = new URL(a.href, window.location.href);
      if (url.pathname !== window.location.pathname) return;
      e.preventDefault();
      const headerH = 64;
      const y = target.getBoundingClientRect().top + window.scrollY - headerH;
      window.scrollTo({ top: y, behavior: 'smooth' });
    });
  });
})();
