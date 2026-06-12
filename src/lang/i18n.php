<?php
// src/lang/i18n.php
// Language detection from URL path segment (/fr/ or /en/)

$uriSegments = explode('/', trim($_SERVER['REQUEST_URI'] ?? '/', '/'));

$lang = match($uriSegments[0]) {
    'en'    => 'en',
    default => 'fr',  // /fr/ and any fallback → French
};

define('CURRENT_LANG', $lang);

// Load translation strings from JSON file
$translations = json_decode(
    file_get_contents(__DIR__ . "/{$lang}.json"),
    associative: true
) ?? [];

/**
 * Translate a key. Falls back to the key itself if not found.
 * Supports {{placeholder}} substitutions.
 */
function t(string $key, array $replacements = []): string {
    global $translations;
    $str = $translations[$key] ?? $key;

    foreach ($replacements as $placeholder => $value) {
        $str = str_replace("{{$placeholder}}", $value, $str);
    }

    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
