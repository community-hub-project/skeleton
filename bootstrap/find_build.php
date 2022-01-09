<?php

require call_user_func(function () {
    $buildDir = __DIR__ . '/../builds/';
    $phars = scandir($buildDir);

    if (false === $phars) {
        exit('Error: build directory could not be read.');
    }

    $phars = array_filter($phars, fn($phar) => !in_array($phar, ['.', '..', 'temp.phar']));
    sort($phars);

    $phar = array_shift($phars);

    if (null === $phar) {
        exit('Error: could not find application build');
    }

    return $buildDir . $phar;
});
