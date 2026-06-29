// public/assets/js/main.js

// ---------------------------------------------------------------------------
// Theme toggle — persists via cookie so PHP can pre-render the correct theme
// on every page load, including after language switches.
// ---------------------------------------------------------------------------

const THEME_COOKIE = 'theme';
const THEME_MAX_AGE = 60 * 60 * 24 * 365; // 1 year in seconds

const setThemeCookie = (theme) => {
  document.cookie = `${THEME_COOKIE}=${theme}; path=/; max-age=${THEME_MAX_AGE}; SameSite=Lax`;
};

const applyTheme = (theme, buttons) => {
  document.documentElement.setAttribute('data-theme', theme);
  setThemeCookie(theme);
  buttons.forEach((btn) => {
    btn.setAttribute('aria-current', btn.dataset.toggleActive === theme ? 'true' : 'false');
  });
};

document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.toggle-btn-group .btn[data-toggle-active]');
  if (!buttons.length) return;

  // Sync button states to the data-theme already set by PHP via cookie
  const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
  applyTheme(currentTheme, buttons);

  // Click: apply selected theme and persist to cookie
  buttons.forEach((btn) => {
    btn.addEventListener('click', () => applyTheme(btn.dataset.toggleActive, buttons));
  });
});
