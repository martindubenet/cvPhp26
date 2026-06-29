<?php
// src/components/hero-header.php
global $translations;

$_heroMap = [
    'home'      => ['title' => 'site.title', 'tagline' => 'site.tagline'],
    'portfolio' => ['title' => 'portfolio.title', 'tagline' => 'portfolio.intro'],
    'cv'        => ['title' => 'cv.title', 'tagline' => null],
    'contact'   => ['title' => 'messageForm.title', 'tagline' => 'messageForm.intro'],
];

$_heroKeys   = $_heroMap[CURRENT_ROUTE] ?? null;
$_hasTitle   = $_heroKeys && array_key_exists($_heroKeys['title'], $translations);
$_hasTagline = $_heroKeys && $_heroKeys['tagline'] && array_key_exists($_heroKeys['tagline'], $translations);
?>

<?php if ($_hasTitle): ?>
<header class="hero">

  <h1 class="hero__title"><?= t($_heroKeys['title']) ?></h1>
  <?php if ($_hasTagline): ?>
    <p class="hero__tagline"><?= t($_heroKeys['tagline']) ?></p>
  <?php endif; ?>

</header>
<?php endif; ?>
