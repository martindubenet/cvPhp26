<?php
// src/components/social-card.php
// Usage: include with $social array item from social-links.json

/**
 * Render a single social teaser card.
 *
 * @param array $social  One item from social-links.json
 */
function renderSocialCard(array $social): void {
  $cardTitle    = htmlspecialchars($social['title']);
  $cardUrl      = htmlspecialchars($social['url']);
  $userAccount  = htmlspecialchars($social['account']);
  $codeName     = htmlspecialchars($social['code']);
  ?>
  <a class="social-card social-card--<?= $codeName ?>"
      href="<?= $cardUrl ?>"
      target="social-networks"
      rel="noopener noreferrer"
      aria-label="<?= $userAccount .' '. t('text.on') .' '. $cardTitle ?>">
    <svg class="social-card__logo icon" role="presentation" aria-hidden="true">
      <use xlink:href="#<?= $codeName ?>-logo"></use>
    </svg>
    <span class="social-card__text">
      <span class="social-card__title"><?= $cardTitle ?></span>
      <span class="social-card__account"><?= $userAccount ?></span>
    </span>
  </a>
<?php
}
