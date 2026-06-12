<?php
// public/fr/contact/index.php — FR Contact form with server-side validation
define('CURRENT_ROUTE', 'contact');

require_once '../../../src/lang/i18n.php';
require_once '../../../src/lang/routes.php';

$feedback = '';
$feedbackType = '';
$formData = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $formData['name']    = trim(htmlspecialchars($_POST['name']    ?? ''));
    $formData['email']   = trim(htmlspecialchars($_POST['email']   ?? ''));
    $formData['message'] = trim(htmlspecialchars($_POST['message'] ?? ''));

    $errors = [];

    if (empty($formData['name'])) {
        $errors[] = t('contact.name');
    }
    if (!filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
        $errors[] = t('contact.email');
    }
    if (empty($formData['message'])) {
        $errors[] = t('contact.message');
    }

    if (empty($errors)) {
        // TODO: replace with actual mailer (PHPMailer or mail())
        $feedbackType = 'success';
        $feedback     = t('contact.success');
        $formData     = ['name' => '', 'email' => '', 'message' => '']; // Clear form
    } else {
        $feedbackType = 'error';
        $feedback     = t('contact.error');
    }
}

require_once '../../../src/templates/head.php';
require_once '../../../src/templates/header.php';
?>

<main class="page-contact">
  <h1><?= t('contact.title') ?></h1>

  <?php if ($feedback): ?>
    <div class="form-feedback form-feedback--<?= $feedbackType ?>" role="alert">
      <?= $feedback ?>
    </div>
  <?php endif; ?>

  <form class="contact-form" method="POST" action="/fr/contact/" novalidate>

    <div class="form-field">
      <label for="name"><?= t('contact.name') ?></label>
      <input type="text" id="name" name="name"
             value="<?= $formData['name'] ?>"
             required autocomplete="name" />
    </div>

    <div class="form-field">
      <label for="email"><?= t('contact.email') ?></label>
      <input type="email" id="email" name="email"
             value="<?= $formData['email'] ?>"
             required autocomplete="email" />
    </div>

    <div class="form-field">
      <label for="message"><?= t('contact.message') ?></label>
      <textarea id="message" name="message"
                rows="6" required><?= $formData['message'] ?></textarea>
    </div>

    <button type="submit" class="btn btn--primary"><?= t('contact.send') ?></button>

  </form>
</main>

<?php require_once '../../../src/templates/footer.php'; ?>
