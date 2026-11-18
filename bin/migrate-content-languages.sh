#!/usr/bin/env bash
#
# One-time migration of single-language content to German (default) + English.
#
# Every content file without a language code (about.txt, site.txt, image.jpg.txt)
# holds the current English text. It becomes:
#   name.en.txt  the English version
#   name.de.txt  a copy for German, shown until it's translated in the Panel
#
# Safe to run twice: files that already have a .de.txt or .en.txt are skipped.
# A backup of the content folder is written next to it first.
#
# Usage:
#   bin/migrate-content-languages.sh <content-dir> [--dry-run]
#
# On a server (from your machine):
#   ssh user@host 'bash -s -- /path/to/project/content' < bin/migrate-content-languages.sh

set -euo pipefail

CONTENT="${1:?Usage: $0 <content-dir> [--dry-run]}"
DRY_RUN="${2:-}"
CONTENT="${CONTENT%/}"

if [ ! -d "$CONTENT" ]; then
  echo "No content folder at $CONTENT" >&2
  exit 1
fi

if [ "$DRY_RUN" != "--dry-run" ]; then
  BACKUP="$CONTENT-backup-$(date +%Y%m%d-%H%M%S).tar.gz"
  tar -czf "$BACKUP" -C "$(dirname "$CONTENT")" "$(basename "$CONTENT")"
  echo "Backup: $BACKUP"
fi

migrated=0
skipped=0

while IFS= read -r -d '' file; do
  base="${file%.txt}"

  # already a language file
  case "$base" in
    *.de | *.en) continue ;;
  esac

  if [ -e "$base.de.txt" ] || [ -e "$base.en.txt" ]; then
    echo "skip (already has a language file): $file"
    skipped=$((skipped + 1))
    continue
  fi

  if [ "$DRY_RUN" = "--dry-run" ]; then
    echo "would migrate: $file"
  else
    cp -p "$file" "$base.de.txt"
    mv "$file" "$base.en.txt"
  fi
  migrated=$((migrated + 1))
done < <(find "$CONTENT" -type f -name '*.txt' -print0)

echo "Migrated: $migrated, skipped: $skipped${DRY_RUN:+ (dry run, nothing changed)}"
