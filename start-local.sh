#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

if ! command -v docker >/dev/null 2>&1; then
  echo "Docker is required to run the local Drupal server." >&2
  exit 1
fi

echo "Starting local Drupal on http://localhost:8080"

docker run --rm \
  -p 8080:8080 \
  -e DRUPAL_DB_DRIVER \
  -e DRUPAL_DB_NAME \
  -e DRUPAL_DB_USER \
  -e DRUPAL_DB_PASSWORD \
  -e DRUPAL_DB_HOST \
  -e DRUPAL_DB_PORT \
  -e DRUPAL_HASH_SALT \
  -v "$PWD/drupal":/var/www/html \
  -w /var/www/html \
  php:8.3-cli \
  php -S 0.0.0.0:8080 -t /var/www/html/web
