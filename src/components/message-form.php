<?php 
$feedback = '';
$feedbackType = '';
$formData = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['name']    = trim(htmlspecialchars($_POST['name']    ?? ''));
    $formData['email']   = trim(htmlspecialchars($_POST['email']   ?? ''));
    $formData['message'] = trim(htmlspecialchars($_POST['message'] ?? ''));

    $errors = [];

    if (empty($formData['name']))    $errors[] = t('messageForm.name');
    if (!filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL)) $errors[] = t('messageForm.email');
    if (empty($formData['message'])) $errors[] = t('messageForm.message');

    if (empty($errors)) {
        // TODO: replace with actual mailer (PHPMailer or mail())
        $feedbackType = 'success';
        $feedback     = t('messageForm.success');
        $formData     = ['name' => '', 'email' => '', 'message' => ''];
    } else {
        $feedbackType = 'error';
        $feedback     = t('messageForm.error');
    }
}
?>

<?php if ($feedback): ?>
  <div class="form-alert form-alert--<?= $feedbackType ?>" role="alert">
    <?= $feedback ?>
  </div>
<?php endif; ?>

<form class="message-form" method="POST" action="/en/contact/" novalidate>

  <div class="form-field">
    <label for="name"><?= t('messageForm.name') ?></label>
    <input type="text" id="name" name="name"
            value="<?= $formData['name'] ?>"
            required autocomplete="name" />
  </div>

  <div class="form-field">
    <label for="email"><?= t('messageForm.email') ?></label>
    <input type="email" id="email" name="email"
            value="<?= $formData['email'] ?>"
            required autocomplete="email" />
  </div>

  <div class="form-field">
    <label for="message"><?= t('messageForm.message') ?></label>
    <textarea id="message" name="message"
              rows="6" required><?= $formData['message'] ?></textarea>
  </div>
  <footer class="actions">
    <button type="submit" class="btn btn--primary"><?= t('messageForm.submit') ?></button>
    <button type="reset" class="btn btn--neutral"><?= t('messageForm.reset') ?></button>
  </footer>

</form>