<?php
// src/templates/header.php
// Requires: CURRENT_LANG, CURRENT_ROUTE, t(), getLangSwitchUrl(), getOtherLang()

// Read active theme from cookie — mirrors head.php logic
$activeTheme = $_COOKIE['theme'] ?? 'light';
$activeTheme = in_array($activeTheme, ['light', 'dark'], true) ? $activeTheme : 'light';

// Build nav items: [route_key => label_translation_key]
$navItems = [
    'home'      => 'nav.home',
    'cv'        => 'nav.cv',
    'portfolio' => 'nav.portfolio',
    'contact'   => 'nav.contact',
];
?>
<header class="site-header">
  <a class="site-header__logo" href="/<?= CURRENT_LANG ?>/">
    <span class="site-header__name">Martin Dubé</span>
  </a>

  <nav class="site-nav" aria-label="<?= t('nav.home') ?>">
    <ul class="site-nav__list">
    <?php foreach ($navItems as $routeKey => $labelKey): ?>
      <?php
        $path    = ROUTE_MAP[$routeKey][CURRENT_LANG === 'fr' ? 0 : 1];
        $isActive = CURRENT_ROUTE === $routeKey;
      ?>
      <li class="site-nav__item<?= $isActive ? ' site-nav__item--active' : '' ?>">
        <a href="<?= $path ?>"<?= $isActive ? 'aria-current="page"' : '' ?> class="site-nav__link btn"><?= t($labelKey) ?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  </nav>

  <section class="site-preferences">
    <!-- Language switcher -->
    <div class="toggle-btn-group">
      <a class="btn toggle toggle--first"
        href="<?= ROUTE_MAP[CURRENT_ROUTE][0] ?>"
        hreflang="fr"
        title="Version française"
        aria-current="<?= CURRENT_LANG === 'fr' ? 'true' : 'false' ?>">Fr</a>
      <a class="btn toggle toggle--last"
        href="<?= ROUTE_MAP[CURRENT_ROUTE][1] ?>"
        hreflang="en"
        title="English version"
        aria-current="<?= CURRENT_LANG === 'en' ? 'true' : 'false' ?>">En</a>
    </div>
    <!-- Theme switcher -->
    <div class="toggle-btn-group">
      <button class="btn btn-icon toggle toggle--first" data-toggle-active="light"
        title="<?= t('nav.themeActionTitle', ['themeName' => t('nav.themeLight')]) ?>"
        aria-current="<?= $activeTheme === 'light' ? 'true' : 'false' ?>">
        <svg role="presentation" aria-hidden="true" class="icon icon--theme-light">
          <use xlink:href="#theme-light-icon"></use>
        </svg>
        <span class="sr-only"><?= t('nav.themeLight') ?></span>
      </button>
      <button class="btn btn-icon toggle toggle--last" data-toggle-active="dark"
        title="<?= t('nav.themeActionTitle', ['themeName' => t('nav.themeDark')]) ?>"
        aria-current="<?= $activeTheme === 'dark' ? 'true' : 'false' ?>">
        <span class="sr-only"><?= t('nav.themeDark') ?></span>
        <svg role="presentation" aria-hidden="true" class="icon icon--theme-dark">
          <use xlink:href="#theme-dark-icon"></use>
        </svg>
      </button>
    </div>
  </section>
</header>
