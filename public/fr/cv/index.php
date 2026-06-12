<?php
// public/fr/cv/index.php — FR Curriculum Vitae
define('CURRENT_ROUTE', 'cv');

require_once '../../../src/lang/i18n.php';
require_once '../../../src/lang/routes.php';
require_once '../../../src/templates/job-card.php';

$jobs = json_decode(
    file_get_contents('../../../src/data/jobs.json'),
    associative: true
) ?? [];

require_once '../../../src/templates/head.php';
require_once '../../../src/templates/header.php';
?>

<main class="page-cv">
  <h1><?= t('cv.title') ?></h1>

  <section class="cv-section" id="experience">
    <h2><?= t('cv.experience') ?></h2>
    <?php foreach ($jobs as $job): ?>
      <?php renderJobCard($job, CURRENT_LANG); ?>
    <?php endforeach; ?>
  </section>
</main>

<?php require_once '../../../src/templates/footer.php'; ?>
