<?php
// src/templates/social-card.php
// Usage: include with $social array item from social-links.json

/**
 * Render a single social teaser card.
 *
 * @param array $social  One item from social-links.json
 */
function renderSocialCard(array $social): void {
    $label  = htmlspecialchars($social['label']);
    $url    = htmlspecialchars($social['url']);
    $handle = htmlspecialchars($social['handle']);
    $icon   = htmlspecialchars($social['icon']);
    ?>
    <a class="social-card social-card--<?= $icon ?>"
       href="<?= $url ?>"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="<?= $label ?> : <?= $handle ?>">
      <span class="social-card__icon" aria-hidden="true">
        <!-- SVG icon loaded via CSS mask-image or inline per $icon value -->
        <span class="icon icon--<?= $icon ?>"></span>
      </span>
      <span class="social-card__body">
        <span class="social-card__network"><?= $label ?></span>
        <span class="social-card__handle"><?= $handle ?></span>
      </span>
    </a>
    <?php
}
