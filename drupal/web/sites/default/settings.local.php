<?php

/**
 * Local Drupal override file used for development and quick installs.
 *
 * This file is loaded by settings.php if it exists.
 * It defaults to SQLite when no database environment variables are provided.
 */

$driver = getenv('DRUPAL_DB_DRIVER') ?: 'sqlite';

if ($driver === 'sqlite') {
  $databases['default']['default'] = [
    'driver' => 'sqlite',
    'database' => $app_root . '/' . $site_path . '/files/local.sqlite',
    'prefix' => '',
  ];
} else {
  $databases['default']['default'] = [
    'driver' => $driver,
    'database' => getenv('DRUPAL_DB_NAME') ?: 'drupal',
    'username' => getenv('DRUPAL_DB_USER') ?: 'drupal',
    'password' => getenv('DRUPAL_DB_PASSWORD') ?: 'drupal',
    'host' => getenv('DRUPAL_DB_HOST') ?: '127.0.0.1',
    'port' => getenv('DRUPAL_DB_PORT') ?: '3306',
    'prefix' => '',
  ];
}

$settings['hash_salt'] = getenv('DRUPAL_HASH_SALT') ?: 'akuafo-hall-local-salt';

// Optional local developer overrides:
// $settings['cache']['bins']['render'] = 'cache.backend.null';
// $settings['cache']['bins']['page'] = 'cache.backend.null';
// $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
// $settings['extension_discovery_scan_tests'] = FALSE;
