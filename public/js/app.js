document.addEventListener('DOMContentLoaded', () => {

  // ── Header scroll effect ──
  const header = document.getElementById('header');
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 40);
  }, { passive: true });

  // ── Active nav on scroll ──
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(l => l.classList.remove('active'));
        const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { threshold: 0.25, rootMargin: '-68px 0px 0px 0px' }).observe
    ? sections.forEach(s => new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            navLinks.forEach(l => l.classList.remove('active'));
            const a = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
            if (a) a.classList.add('active');
          }
        });
      }, { threshold: 0.25, rootMargin: '-68px 0px 0px 0px' }).observe(s))
    : null;

  // ── Hamburger ──
  const hamburger = document.getElementById('hamburger');
  const nav       = document.getElementById('nav');
  hamburger.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', open);
  });
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      nav.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
    });
  });

  // ── Fade-up animations ──
  const targets = document.querySelectorAll(
    '.infra-card, .acred-card, .grad-card, .tl-item, .valor-chip, .unidad-item, .tags-card, .inmerco-card, .campo-card'
  );
  targets.forEach(el => el.classList.add('fade-up'));
  const obs = new IntersectionObserver(entries => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 55);
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.08 });
  targets.forEach(el => obs.observe(el));

});
