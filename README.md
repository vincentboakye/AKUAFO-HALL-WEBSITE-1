# AKUAFO Hall Website

## Local development

This repository includes a local Drupal override file and a reusable startup script.

### Start the site locally

1. Install Docker.
2. Run:

```bash
./start-local.sh
```

3. Open in your browser:

```bash
http://localhost:8080
```

The site will use SQLite by default and should redirect to the Drupal installer at `/core/install.php` if the site is not yet installed.

### Use a MySQL/MariaDB database instead

Set environment variables before running the script:

```bash
export DRUPAL_DB_DRIVER=mysql
export DRUPAL_DB_HOST=127.0.0.1
export DRUPAL_DB_PORT=3306
export DRUPAL_DB_NAME=drupal
export DRUPAL_DB_USER=drupal
export DRUPAL_DB_PASSWORD=drupal
export DRUPAL_HASH_SALT="akuafo-hall-local-salt"
./start-local.sh
```

### Local settings file

The repository includes `drupal/web/sites/default/settings.local.php`.
It is loaded automatically by `drupal/web/sites/default/settings.php` if present.

### Notes

- The local database file is stored in `drupal/web/sites/default/files/local.sqlite`.
- If you want to use a different local DB path, update `drupal/web/sites/default/settings.local.php`.
- The site requires PHP 8.3 or newer, which is provided by the Docker image used by `start-local.sh`.
