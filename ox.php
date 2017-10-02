#!/usr/bin/env php
<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2017 Zorcastudio. All rights reserved.
 * @license     MIT License; see LICENSE file for details.
 */

namespace Ox;

define('DS', '/');
define('OX_ROOT', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));
define('OX_NAME', 'ox');
define('OX_VERSION', '0.0.0');
define('OX_CONFIG_FOLDER', '/etc/ox');
define('OX_DB_FOLDER', '/var/lib/ox');

require OX_ROOT . '/vendor/autoload.php';

$ox = new Ox();
$console = $ox['console'];
$console->run();
