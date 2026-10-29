<?php
/**
 * DOLERO — Landing Page
 * Design rationale: Image leads, typography is the personality.
 * RTL Arabic, premium confectionery brand, InfinityFree-safe.
 */
$shop = [
  'name'     => 'DOLERO',
  'tagline'  => 'Sweet Moments',
  'whatsapp' => '962790000000',
  'is_open'  => true,
];
$wa = 'https://wa.me/' . preg_replace('/\D/', '', $shop['whatsapp'])
    . '?text=' . urlencode('السلام عليكم مشغل دوليرو 🌸 أودّ الاستفسار عن التشكيلة المتوفرة');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $shop['name'] ?> | <?= $shop['tagline'] ?></title>
  <meta name="description" content="حلويات وكيك فاخرة مصنوعة بحب — تشيز كيك، كب كيك، وبوكسات مناسبات جاهزة فوراً أو حسب طلبكم.">
  <meta name="theme-color" content="#FBF0EC">
  <meta property="og:title"       content="<?= $shop['name'] ?> — <?= $shop['tagline'] ?>">
  <meta property="og:image"       content="assets/images/hero.jpg">
  <meta property="og:description" content="حلويات وكيك فاخرة مصنوعة بحب يومياً.">
  <link rel="icon" type="image/jpeg" href="assets/images/logo.jpg">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ══════════════════════════════════════════════════════════
     HEADER
══════════════════════════════════════════════════════════════ -->
<header class="site-header" id="siteHeader">
  <div class="container header-row">

    <a href="#hero" class="brand" aria-label="الرئيسية">
      <div class="brand-ring">
        <img src="assets/images/logo.jpg" alt="شعار دوليرو" width="44" height="44">
      </div>
      <div class="brand-words">
        <span class="brand-name"><?= $shop['name'] ?></span>
        <span class="brand-tag"><?= $shop['tagline'] ?></span>
      </div>
    </a>

    <nav class="header-nav" aria-label="التنقل الرئيسي">
      <a href="#hero"  class="nav-link active">الرئيسية</a>
      <a href="#menu"  class="nav-link">قائمة الحلويات</a>
      <a href="<?= $wa ?>" target="_blank" rel="noopener" class="nav-link">تواصل معنا</a>
    </nav>

    <div class="header-actions">
      <?php if ($shop['is_open']): ?>
      <span class="live-dot" title="نستقبل طلباتكم الآن"></span>
      <?php endif; ?>

      <button type="button" class="cart-btn" id="openCartBtn" aria-label="السلة">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v11h12.44l2-8H8V4h13.56a1 1 0 0 1 .97 1.25l-2.4 9.6a1 1 0 0 1-.97.75H5.74L5 17h14v2H4a1 1 0 0 1-.97-1.75L4 16ZM6 22a2 2 0 1 1 0-4 2 2 0 0 1 0 4Zm13 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z"/>
        </svg>
        <span class="cart-text">السلة</span>
        <span class="cart-badge" id="headerCartCount">0</span>
      </button>

      <button type="button" class="hamburger" id="menuToggle"
              aria-label="القائمة" aria-expanded="false" aria-controls="mobileNav">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>

  <nav class="mobile-nav" id="mobileNav" aria-label="التنقل المحمول">
    <a href="#hero"  class="nav-link">الرئيسية</a>
    <a href="#menu"  class="nav-link">قائمة الحلويات</a>
    <a href="<?= $wa ?>" target="_blank" rel="noopener" class="nav-link">تواصل معنا عبر واتساب</a>
  </nav>
</header>

<!-- ══════════════════════════════════════════════════════════
     HERO — Image leads, especially on mobile
══════════════════════════════════════════════════════════════ -->
<main>
  <section class="hero section-full" id="hero">

    <!-- Full-screen background image -->
    <div class="hero-img-col">
      <img src="assets/images/hero.jpg"
           alt="تشكيلة كب كيك وتشيز كيك وحلويات فاخرة من مشغل دوليرو"
           class="hero-photo"
           width="1200" height="800"
           loading="eager">
      <!-- Warm cocoa gradient overlay for text readability -->
      <div class="hero-overlay" aria-hidden="true"></div>
    </div>

    <!-- Decorative seal (desktop only via CSS display:none on mobile) -->
    <div class="hero-seal" aria-hidden="true">
      <img src="assets/images/logo.jpg" alt="" width="44" height="44">
      <span>DOLERO</span>
    </div>

    <!-- Copy column -->
    <div class="hero-copy">

      <!-- Eyebrow: a real editorial line, not a pill badge -->
      <div class="hero-eyebrow">
        <span class="hero-eyebrow-line"></span>
        <span>مشغل دوليرو — حلويات فاخرة</span>
      </div>

      <!-- The headline IS the hero — big, bold, real -->
      <h1 class="hero-hl">
        حلويات صنعت<br>
        لتُحفر في ذاكرة<br>
        لحظاتكم
      </h1>

      <!-- Description: warm, direct, no AI filler phrases -->
      <p class="hero-desc">
        من تشيز كيك بلوبيري طازج إلى كب كيك مخصوص لمناسبتكم — كل قطعة تُصنع
        باليد يومياً بمكونات مختارة، جاهزة فوراً أو تجهّز حسب رغبتكم.
      </p>

      <!-- CTAs -->
      <div class="hero-ctas">
        <a href="#menu" class="cta-primary">
          <span>شوف القائمة</span>
          <!-- arrow down SVG -->
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 16-6-6h12Z"/></svg>
        </a>
        <a href="<?= $wa ?>" target="_blank" rel="noopener" class="cta-ghost">
          <!-- WhatsApp SVG -->
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.522 3.656 1.432 5.17L2 22l4.93-1.293A9.953 9.953 0 0 0 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2Zm4.7 13.71c-.2.56-.976 1.01-1.6 1.14-.428.09-.985.162-2.86-.615-2.4-1.003-3.95-3.435-4.07-3.593-.116-.157-.967-1.287-.967-2.454 0-1.167.61-1.74.826-1.98a.878.878 0 0 1 .636-.3c.118 0 .227.005.327.01.26.012.39.028.561.44.21.51.72 1.766.783 1.895.063.13.105.28.02.448-.082.166-.124.27-.248.415-.124.146-.26.325-.371.438-.123.123-.25.257-.107.504.143.248.637.993 1.369 1.608 1.05.937 1.922 1.238 2.272 1.381.267.108.583.083.782-.13.248-.265.556-.706.87-1.141.222-.313.5-.35.79-.24.292.108 1.853.874 2.172 1.034.318.16.529.237.607.367.077.13.077.75-.123 1.31Z"/>
          </svg>
          <span>اطلب عبر واتساب</span>
        </a>
      </div>

      <!-- Trust strip: horizontal scroll pills, not icon columns -->
      <div class="trust-strip">
        <div class="trust-pill">
          <span class="trust-dot"></span>
          <span>جاهز فوراً</span>
        </div>
        <div class="trust-pill">
          <span class="trust-dot"></span>
          <span>حسب الطلب</span>
        </div>
        <div class="trust-pill">
          <span class="trust-dot"></span>
          <span>مكونات طازجة يومياً</span>
        </div>
        <div class="trust-pill">
          <span class="trust-dot"></span>
          <span>تنسيق للمناسبات</span>
        </div>
      </div>

      <!-- Scroll hint inside hero-copy to guarantee zero overlap -->
      <a href="#menu" class="scroll-hint" aria-label="تصفح قائمة الحلويات">
        <span>تصفح</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 16-6-6h12Z"/></svg>
      </a>

    </div>

  </section>

  <!-- ═══════════════════════════════════════
       MENU SECTION — 100 vh placeholder
       (content added next step)
  ════════════════════════════════════════════ -->
  <section class="menu-placeholder" id="menu">
    <div class="menu-placeholder-inner reveal">
      <p>قائمة الحلويات — قريباً</p>
    </div>
  </section>

</main>

<script src="assets/js/gsap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
