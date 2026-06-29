<?php
// public/en/contact/index.php — EN Contact form with server-side validation
define('CURRENT_ROUTE', 'contact');

require_once '../../../src/lang/i18n.php';
require_once '../../../src/lang/routes.php';
require_once '../../../src/templates/head.php';
require_once '../../../src/templates/header.php';
?>

<main class="site page--contact">
  <?php 
    require_once '../../../src/components/hero-header.php';
    require_once '../../../src/components/message-form.php';
  ?>

</main>

<?php require_once '../../../src/templates/footer.php'; ?>
