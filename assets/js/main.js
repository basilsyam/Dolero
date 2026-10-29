/**
 * DOLERO — Main JavaScript
 * Butter-smooth anchor navigation, mobile drawer & GSAP entrance.
 */

/* ── 1. Header scroll effect ───────────────────────────────────────────────── */
const header = document.getElementById('siteHeader');
if (header) {
  const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 20);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* ── 2. Mobile nav toggle ──────────────────────────────────────────────────── */
const hamburger = document.getElementById('menuToggle');
const mobileNav = document.getElementById('mobileNav');
if (hamburger && mobileNav) {
  hamburger.addEventListener('click', () => {
    const open = hamburger.classList.toggle('open');
    mobileNav.classList.toggle('open', open);
    hamburger.setAttribute('aria-expanded', String(open));
  });
}

/* ── 3. Ultra-Smooth Anchor Navigation ─────────────────────────────────────── */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const href = this.getAttribute('href');
    if (!href || href === '#') return;

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();

    // Close mobile nav drawer if open
    if (hamburger && mobileNav && mobileNav.classList.contains('open')) {
      hamburger.classList.remove('open');
      mobileNav.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
    }

    const headerHeight = header ? header.offsetHeight : 70;
    const elementPosition = target.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - (href === '#hero' ? 0 : headerHeight);

    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  });
});

/* ── 4. Active Nav Indicator on Scroll ────────────────────────────────────── */
const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
window.addEventListener('scroll', () => {
  let currentId = '';
  document.querySelectorAll('section[id]').forEach(section => {
    const rect = section.getBoundingClientRect();
    if (rect.top <= 120 && rect.bottom >= 120) {
      currentId = section.id;
    }
  });

  if (currentId) {
    navLinks.forEach(link => {
      link.classList.toggle('active', link.getAttribute('href') === `#${currentId}`);
    });
  }
}, { passive: true });

/* ── 5. Cart Badge Synchronizer (LocalStorage) ────────────────────────────── */
const cartEl = document.getElementById('headerCartCount');
function syncCart() {
  try {
    const cart = JSON.parse(localStorage.getItem('dolero_cart') || '[]');
    if (cartEl) cartEl.textContent = cart.reduce((acc, item) => acc + (item.quantity || 1), 0);
  } catch (_) {
    if (cartEl) cartEl.textContent = '0';
  }
}
syncCart();
window.addEventListener('storage', syncCart);

/* ── 6. IntersectionObserver for Reveal Elements ───────────────────────────── */
const revealObserver = new IntersectionObserver(
  entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
);
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

/* ── 7. GSAP Entrance Animation (Centered, Orchestrated) ───────────────────── */
window.addEventListener('load', () => {
  if (typeof gsap === 'undefined') return;

  const siteHeader = document.querySelector('.site-header');
  const eyebrow    = document.querySelector('.hero-eyebrow');
  const headline   = document.querySelector('.hero-hl');
  const desc       = document.querySelector('.hero-desc');
  const ctas       = document.querySelector('.hero-ctas');
  const strip      = document.querySelector('.trust-strip');
  const photo      = document.querySelector('.hero-photo');
  const seal       = document.querySelector('.hero-seal');
  const hint       = document.querySelector('.scroll-hint');

  const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

  // Soft photo zoom-in
  if (photo) {
    tl.from(photo, { scale: 1.05, opacity: 0.4, duration: 1.2, ease: 'power2.out' }, 0);
  }

  // Header slide down
  if (siteHeader) {
    tl.from(siteHeader, { y: -20, opacity: 0, duration: 0.6 }, 0.1);
  }

  // Centered text cascade
  const copyElements = [eyebrow, headline, desc, ctas, strip].filter(Boolean);
  if (copyElements.length) {
    tl.from(copyElements, {
      y: 28,
      opacity: 0,
      stagger: 0.1,
      duration: 0.85
    }, 0.3);
  }

  // Floating seal & hint
  if (seal) {
    tl.from(seal, { scale: 0.7, opacity: 0, duration: 0.6, ease: 'back.out(2)' }, 0.8);
    gsap.to(seal, {
      rotation: '-=6',
      y: -4,
      duration: 3.5,
      repeat: -1,
      yoyo: true,
      ease: 'sine.inOut',
      delay: 1.5
    });
  }

  if (hint) {
    tl.from(hint, { opacity: 0, y: 10, duration: 0.5 }, 0.9);
  }
});
