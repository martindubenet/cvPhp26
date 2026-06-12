<?php
// src/templates/head.php
// Requires: CURRENT_LANG, CURRENT_ROUTE, t(), getHreflang()
$pageTitle = t('site.title') . ' — ' . t('nav.' . CURRENT_ROUTE === 'home' ? 'home' : CURRENT_ROUTE);
?>
<!DOCTYPE html>
<html lang="<?= CURRENT_LANG ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Martin Dubé" />
  <meta name="description" content="<?= t('site.tagline') ?>" />

  <!-- Canonical hreflang alternates for SEO -->
  <link rel="alternate" hreflang="fr"      href="https://martindube.net<?= getHreflang('fr') ?>" />
  <link rel="alternate" hreflang="en"      href="https://martindube.net<?= getHreflang('en') ?>" />
  <link rel="alternate" hreflang="x-default" href="https://martindube.net<?= getHreflang('fr') ?>" />

  <link rel="stylesheet" href="/assets/css/main.css" />

  <title><?= htmlspecialchars($pageTitle) ?></title>
</head>
<body class="lang-<?= CURRENT_LANG ?> page-<?= CURRENT_ROUTE ?>">
