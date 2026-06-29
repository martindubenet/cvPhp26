<?php
// public/en/resume/index.php — EN Resume
define('CURRENT_ROUTE', 'cv');

require_once '../../../src/lang/i18n.php';
require_once '../../../src/lang/routes.php';
require_once '../../../src/components/job-card.php';

$jobs = json_decode(
    file_get_contents('../../../src/data/jobs.json'),
    associative: true
) ?? [];

require_once '../../../src/templates/head.php';
require_once '../../../src/templates/header.php';
?>

<main class="site page--cv">
  <?php require_once '../../../src/components/hero-header.php'; ?>

  <section class="cv-section">

    <?php foreach ($jobs as $job): ?>
      <?php renderJobCard($job, CURRENT_LANG); ?>
    <?php endforeach; ?>

  </section>
</main>

<?php require_once '../../../src/templates/footer.php'; ?>
