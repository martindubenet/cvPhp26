<?php
// public/en/index.php — EN Home page
define('CURRENT_ROUTE', 'home');

require_once '../../src/lang/i18n.php';
require_once '../../src/lang/routes.php';
require_once '../../src/templates/social-card.php';

$socialLinks = json_decode(
    file_get_contents('../../src/data/social-links.json'),
    associative: true
) ?? [];

require_once '../../src/templates/head.php';
require_once '../../src/templates/header.php';
?>

<main class="page-home">
  <section class="home-hero">
    <h1 class="home-hero__title"><?= t('site.title') ?></h1>
    <p class="home-hero__tagline"><?= t('site.tagline') ?></p>
  </section>

  <section class="social-grid" aria-label="<?= t('home.intro') ?>">
    <h2 class="social-grid__heading"><?= t('home.intro') ?></h2>
    <div class="social-grid__cards">
      <?php foreach ($socialLinks as $social): ?>
        <?php renderSocialCard($social); ?>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php require_once '../../src/templates/footer.php'; ?>
