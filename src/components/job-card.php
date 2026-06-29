<?php
// src/templates/job-card.php
// Renders a CV job entry. If hasPortfolio is true, shows a dialog trigger button.

/**
 * Render a single job entry card.
 *
 * @param array  $job   One item from jobs.json
 * @param string $lang  Current language code ('fr' or 'en')
 */
function renderJobCard(array $job, string $lang): void {
    $id          = htmlspecialchars($job['id']);
    $company     = htmlspecialchars($job['company']);
    $location    = htmlspecialchars($job['location']);
    $role        = htmlspecialchars($job['role'][$lang]);
    $description = htmlspecialchars($job['description'][$lang]);
    $hasPortfolio = $job['hasPortfolio'] ?? false;

    // Format date range
    $start = formatJobDate($job['dateStart'], $lang);
    $end   = formatJobDate($job['dateEnd'], $lang);
    ?>
    <article class="job-card" id="job-<?= $id ?>">
      <header class="job-card__header">
        <div class="job-card__meta">
          <span class="job-card__date"><?= $start ?> — <?= $end ?></span>
          <span class="job-card__location"><?= $location ?></span>
        </div>
        <h3 class="job-card__role"><?= $role ?></h3>
        <h4 class="job-card__company"><?= $company ?></h4>
      </header>

      <div class="job-card__description">
        <p><?= $description ?></p>
      </div>

      <?php if (!empty($job['links'])): ?>
        <ul class="job-card__links">
          <?php foreach ($job['links'] as $link): ?>
            <li>
              <a href="<?= htmlspecialchars($link['url']) ?>"
                 target="_blank" rel="noopener noreferrer">
                <?= htmlspecialchars($link['label']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if ($hasPortfolio): ?>
        <!-- Dialog trigger — shown only for design jobs with portfolio items -->
        <button class="job-card__portfolio-trigger"
                data-dialog="portfolio-<?= $id ?>"
                aria-haspopup="dialog">
          <?= $lang === 'fr' ? 'Voir le portfolio' : 'View portfolio' ?>
        </button>
      <?php endif; ?>
    </article>
    <?php
}

/**
 * Format a YYYY-MM date string into a localized readable string.
 */
function formatJobDate(string $date, string $lang): string {
    if (empty($date)) return '';
    [$year, $month] = explode('-', $date);
    $months_fr = ['', 'Janv.','Févr.','Mars','Avr.','Mai','Juin',
                      'Juil.','Août','Sept.','Oct.','Nov.','Déc.'];
    $months_en = ['', 'Jan','Feb','Mar','Apr','May','Jun',
                      'Jul','Aug','Sep','Oct','Nov','Dec'];
    $label = $lang === 'fr' ? $months_fr[(int)$month] : $months_en[(int)$month];
    return "{$label} {$year}";
}
