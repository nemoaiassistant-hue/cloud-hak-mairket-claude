/* Cloud Hak — client JS */
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

  /* ---------- Form submission (front-end only) ---------- */
  const form = document.getElementById('intake-form');
  const status = document.getElementById('form-status');
  if (form && status) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      // Honeypot — silently drop bots
      const hp = form.elements.namedItem('website_url_hp');
      if (hp && hp.value) return;

      // Required field validation
      const required = form.querySelectorAll('[required]');
      const missing = [];
      required.forEach((el) => {
        if (!el.value || !el.value.trim()) missing.push(el);
      });
      if (missing.length) {
        status.textContent = 'Please complete the required fields before sending.';
        status.className = 'form-status error';
        missing[0].focus();
        return;
      }

      // At least one service must be selected
      const services = form.querySelectorAll('input[name="services[]"]:checked');
      if (!services.length) {
        status.textContent = 'Please choose at least one service so we know how to help.';
        status.className = 'form-status error';
        return;
      }

      // Disable submit during processing
      const btn = form.querySelector('button[type="submit"]');
      const btnOriginalText = btn ? btn.textContent : '';
      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Sending…';
      }
      status.textContent = '';
      status.className = 'form-status';

      // Simulate async submission (static site — no backend)
      setTimeout(() => {
        status.textContent = 'Thanks — your brief was received. We’ll respond within one business day.';
        status.className = 'form-status success';
        form.reset();
        const targetY = status.getBoundingClientRect().top + window.scrollY - 200;
        window.scrollTo({ top: targetY, behavior: 'smooth' });
        if (btn) {
          btn.disabled = false;
          btn.textContent = btnOriginalText;
        }
      }, 600);
    });
  }

  /* ---------- Smooth scroll for anchor links ---------- */
  document.querySelectorAll('a[href*="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const href = a.getAttribute('href');
      const hashIdx = href.indexOf('#');
      if (hashIdx === -1) return;
      const id = href.slice(hashIdx);
      if (id.length < 2) return;
      const target = document.querySelector(id);
      if (!target) return;
      const url = new URL(a.href, window.location.href);
      if (url.pathname !== window.location.pathname) return;
      e.preventDefault();
      const headerH = 64;
      const y = target.getBoundingClientRect().top + window.scrollY - headerH;
      window.scrollTo({ top: y, behavior: 'smooth' });
    });
  });
})();
