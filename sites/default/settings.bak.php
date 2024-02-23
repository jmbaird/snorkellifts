<?php

include __DIR__ . '/settings/settings.shared.php';
$databases['default']['default'] = array (
  'database' => 'drupal8',
  'username' => 'drupal8',
  'password' => 'drupal8',
  'prefix' => '',
  'host' => 'database',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$settings['hash_salt'] = 'bSgqAE4YcLSCRB2VTHGcm2OQXBqGt5PgLfWCAmZZFV8RSlvMHLofVcTe_tN9TYJ36O5g89BAfQ';
$settings['install_profile'] = 'standard';
