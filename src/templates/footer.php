<?php
// src/templates/footer.php
$year = date('Y');
?>
<footer class="site-footer">
  <p class="site-footer__copy">
    &copy; <?= $year ?> Martin Dubé — <?= t('footer.rights') ?>
  </p>
</footer>
<script src="/assets/js/main.js"></script>
</body>
</html>
