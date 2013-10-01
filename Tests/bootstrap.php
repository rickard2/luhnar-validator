<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';

// http://kriswallsmith.net/post/1338263070/how-to-test-a-symfony2-bundle
spl_autoload_register(
    function ($class) {
        if (0 === strpos($class, 'Rickard2\\LuhnarValidator\\')) {

            $class = str_replace('Rickard2\LuhnarValidator', '', $class);

            $path = implode('/', array_slice(explode('\\', $class), 1)) . '.php';
            require_once __DIR__ . '/../' . $path;
            return true;
        }

        return false;
    }
);