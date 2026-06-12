<?php
// src/templates/header.php
// Requires: CURRENT_LANG, CURRENT_ROUTE, t(), getLangSwitchUrl(), getOtherLang()

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
          <a href="<?= $path ?>"
             <?= $isActive ? 'aria-current="page"' : '' ?>
             class="site-nav__link">
            <?= t($labelKey) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <!-- Language switcher -->
  <a class="lang-switch"
     href="<?= getLangSwitchUrl() ?>"
     hreflang="<?= CURRENT_LANG === 'fr' ? 'en' : 'fr' ?>"
     aria-label="Switch to <?= getOtherLang() ?>">
    <?= getOtherLang() ?>
  </a>
</header>
