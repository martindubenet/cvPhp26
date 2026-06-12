# cvPhp26 — martindube.net

Portfolio personnel et CV de Martin Dubé — PHP + SCSS + JavaScript.

## Stack

- **PHP** 8.x (built-in server pour le dev local)
- **SCSS** → CSS via Dart Sass
- **JavaScript** vanilla ES modules
- **i18n** : FR (défaut) / EN — routes `/fr/` et `/en/`

## Démarrage rapide

```zsh
# 1. Installer les dépendances npm (Sass)
npm install

# 2. Compiler le SCSS en mode watch
npm run sass:watch

# 3. Dans un autre onglet Terminal, lancer le serveur PHP
npm run serve
# → http://localhost:8080  (redirige vers /fr/)
```

## Scripts npm disponibles

| Commande | Description |
|---|---|
| `npm run sass` | Compile SCSS une fois (dev, avec source maps) |
| `npm run sass:watch` | Compilation SCSS en continu |
| `npm run build` | Compile SCSS minifié pour la production |
| `npm run serve` | Lance `php -S localhost:8080 -t public` |

## Structure des URLs

| Page | FR | EN |
|---|---|---|
| Accueil | `/fr/` | `/en/` |
| CV | `/fr/cv/` | `/en/resume/` |
| Portfolio | `/fr/portfolio/` | `/en/portfolio/` |
| Contact | `/fr/contact/` | `/en/contact/` |

## Contenu

Le contenu dynamique est centralisé dans `src/data/` :

- `jobs.json` — expériences professionnelles (FR + EN)
- `portfolio.json` — réalisations
- `social-links.json` — liens réseaux sociaux

Les traductions d'interface sont dans `src/lang/fr.json` et `src/lang/en.json`.

## Déploiement

Configurer les secrets GitHub (`FTP_SERVER`, `FTP_USER`, `FTP_PASSWORD` ou SSH)
puis activer le workflow dans `.github/workflows/deploy.yml`.
