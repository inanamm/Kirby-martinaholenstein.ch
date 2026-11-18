# Martina Holenstein

Portfolio site for [martinaholenstein.ch](https://martinaholenstein.ch), built with [Kirby CMS](https://getkirby.com) 5 and [Kirby SEO](https://plugins.andkindness.com/seo) 2.

## Setup

```bash
composer install
npm install
```

Needs PHP 8.4 or newer, the version the servers run. With Nix and direnv, a local `.envrc` +
`.nix/flake.nix` (kept out of git) provide PHP 8.4 and Composer.

`content/` isn't in git: copy it from the live server to work locally.
The styled 404 (`site/templates/error.php`) needs an `error` page in the content
(create it in the Panel if it's missing).

## Development

```bash
npm run dev     # or: composer start
```

Runs PHP's built-in server on `localhost:8888`, serving `public_html/` through `server.php`.
Visit `/panel` to create the first account locally (Kirby only allows the Panel installer on localhost).

## Languages

German is the default language at `/`, English lives under `/en` (`site/languages/`).
Content files carry the language code (`about.de.txt`, `about.en.txt`), and a switcher
in the header links to the other language of the current page. UI texts like the 404
page are translated in the language files.

The switch from a single-language site needs a one-time content migration on each
server. It moves every `name.txt` to `name.en.txt` and copies it to `name.de.txt`
(German shows the English text until it's translated), after writing a backup:

```bash
bin/migrate-content-languages.sh content --dry-run   # locally, see what changes
ssh user@host 'bash -s -- /path/to/project/content' < bin/migrate-content-languages.sh
```

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

Pages are cached as static HTML in `public_html/static/` ([Staticache](https://github.com/getkirby/staticache)).
Apache serves them without PHP (`public_html/.htaccess`). Kirby clears the cache when content changes
in the Panel, and every deploy deletes it. Caching is off on localhost.

Both servers need PHP 8.4+. Kirby SEO 2 needs a paid license per public domain: activate it in
the Panel under "Metadata & SEO" → "Activate" (not needed locally).

Search engines only index the live domain (`tobimori.seo.robots.index` in
`config.martinaholenstein.ch.php`).

## Folder structure

```
content/        → Kirby content (gitignored, lives on the server)
public_html/    → web root (index.php, .htaccess, assets, favicon, media, static/ = page cache)
site/
  blueprints/   → Panel blueprints (each page has an SEO tab)
  config/       → config.php + per-domain overrides
  languages/    → German (default) and English
  plugins/      → installed by Composer (gitignored)
  snippets/
  templates/
storage/        → accounts, cache, sessions (gitignored)
bin/            → one-off maintenance scripts (not deployed)
vendor/, kirby/ → Composer dependencies (gitignored)
node_modules/   → npm dev tooling (gitignored)
```
