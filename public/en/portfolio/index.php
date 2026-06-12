<?php
// public/en/portfolio/index.php — EN Portfolio
define('CURRENT_ROUTE', 'portfolio');

require_once '../../../src/lang/i18n.php';
require_once '../../../src/lang/routes.php';

$items = json_decode(
    file_get_contents('../../../src/data/portfolio.json'),
    associative: true
) ?? [];

require_once '../../../src/templates/head.php';
require_once '../../../src/templates/header.php';
?>

<main class="page-portfolio">
  <h1><?= t('portfolio.title') ?></h1>
  <p class="page-portfolio__intro"><?= t('portfolio.intro') ?></p>

  <div class="portfolio-grid">
    <?php foreach ($items as $item): ?>
      <article class="portfolio-item" id="portfolio-<?= htmlspecialchars($item['id']) ?>">
        <h2 class="portfolio-item__title"><?= htmlspecialchars($item['title'][CURRENT_LANG]) ?></h2>
        <p class="portfolio-item__year"><?= htmlspecialchars((string)$item['year']) ?></p>
        <p class="portfolio-item__description"><?= htmlspecialchars($item['description'][CURRENT_LANG]) ?></p>
        <ul class="portfolio-item__tools">
          <?php foreach ($item['tools'] as $tool): ?>
            <li><?= htmlspecialchars($tool) ?></li>
          <?php endforeach; ?>
        </ul>
      </article>
    <?php endforeach; ?>
  </div>
</main>

<?php require_once '../../../src/templates/footer.php'; ?>
