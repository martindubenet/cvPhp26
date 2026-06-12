<?php
// Root entry point — redirect to default language (French)
// Use 301 in production for SEO, 302 during development
header('Location: /fr/', true, 302);
exit;
