<?php

$dir = dirname(__FILE__) . '/';

if (strlen($dir) < (PHP_MAXPATHLEN - 1000)) {
    exit('Error: Application is nested too deeply in the file system.');
}

if (version_compare(PHP_VERSION, '8.0.0') < 0) {
    exit('Error: PHP version must be at least 8.0.0.');
}

$phar = require $dir . 'bootstrap/find_build.php';
$entryPoint = 'phar://' . $phar . '/cron.php';

require $dir . 'bootstrap/run_build.php';
