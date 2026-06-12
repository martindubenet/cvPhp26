<?php
// src/lang/routes.php
// Bidirectional route map — each key maps to [fr_path, en_path]

const ROUTE_MAP = [
    'home'      => ['/fr/',           '/en/'],
    'cv'        => ['/fr/cv/',        '/en/resume/'],
    'portfolio' => ['/fr/portfolio/', '/en/portfolio/'],
    'contact'   => ['/fr/contact/',   '/en/contact/'],
];

/**
 * Return the equivalent URL in the opposite language.
 * Requires CURRENT_LANG and CURRENT_ROUTE to be defined.
 */
function getLangSwitchUrl(): string {
    $map   = ROUTE_MAP[CURRENT_ROUTE] ?? ['/fr/', '/en/'];
    return CURRENT_LANG === 'fr' ? $map[1] : $map[0];
}

/**
 * Return the opposite language code label.
 */
function getOtherLang(): string {
    return CURRENT_LANG === 'fr' ? 'EN' : 'FR';
}

/**
 * Return the hreflang alternate URL for a given lang key.
 */
function getHreflang(string $lang): string {
    $map = ROUTE_MAP[CURRENT_ROUTE] ?? ['/fr/', '/en/'];
    return $lang === 'fr' ? $map[0] : $map[1];
}
