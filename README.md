# Martina Holenstein

Portfolio site for [martinaholenstein.ch](https://martinaholenstein.ch), built with [Kirby CMS](https://getkirby.com) 5 and [Kirby SEO](https://plugins.andkindness.com/seo) 2.

## Setup

```bash
composer install
npm install
```

Needs PHP 8.3 or newer (Kirby SEO 2 requirement; Kirby 5 itself supports 8.2–8.5). With Nix and
direnv, a local `.envrc` + `.nix/flake.nix` (kept out of git) provide PHP 8.3 and Composer.

`content/` isn't in git: copy it from the live server to work locally.

## Development

```bash
npm run dev     # or: composer start
```

Runs PHP's built-in server on `localhost:8000`, serving `public_html/` through `server.php`.
Visit `/panel` to create the first account locally (the Panel installer is only enabled on localhost).

## Format

```bash
npm run format        # apply
npm run format:check  # check (runs in CI)
```

Runs Prettier (JS, CSS, Markdown), Stylelint (CSS) and
[ECS](https://github.com/easy-coding-standard/easy-coding-standard) (PSR-12, PHP).
`composer lint` / `composer fix` run ECS alone.

## Deployment

| Branch | Deploys to                           |
| ------ | ------------------------------------ |
| `main` | https://preview.martinaholenstein.ch |
| `live` | https://martinaholenstein.ch         |

GitHub Actions deploys over SSH (`.github/workflows/deploy.yml`). Every push to `main` keeps a
"Release: main → live" PR up to date; merging it (with a merge commit) releases to live.
PRs are checked by `check.yml`, and Dependabot patch updates are merged automatically.

Each server's document root must point to `public_html/`. Server secrets live in the `Live` and
`preview` GitHub environments: `SERVER_URL`, `USERNAME`, `SSH_KEY` or `PASSWORD`, and the variable
`SERVER_DIRECTORY` (the project root, not `public_html`).

Both servers need PHP 8.3+. Kirby SEO 2 needs a paid license per public domain: activate it in
the Panel under "Metadata & SEO" → "Activate" (not needed locally).

Search engines only index the live domain (`tobimori.seo.robots.index` in
`config.martinaholenstein.ch.php`).

## Folder structure

```
content/        → Kirby content (gitignored, lives on the server)
public_html/    → web root (index.php, .htaccess, assets, favicon, media)
site/
  blueprints/   → Panel blueprints (each page has an SEO tab)
  config/       → config.php + per-domain overrides
  plugins/      → installed by Composer (gitignored)
  snippets/
  templates/
storage/        → accounts, cache, sessions (gitignored)
vendor/, kirby/ → Composer dependencies (gitignored)
node_modules/   → npm dev tooling (gitignored)
```
