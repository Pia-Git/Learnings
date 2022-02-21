<?php

declare(strict_types=1);

namespace My\App;

$config = require 'config.php';
//require_once __DIR__.'/src/Entity/Post.php';


spl_autoload_register(function(string $className) use ($config){
    $prefix = $config['prefix'];
    $baseDir = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR;

    $class = str_replace($prefix, '', $className);

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $resultingPath = $baseDir . $class . '.php';

    @include $resultingPath;
} );

$arr = get_declared_classes();

new Entity\Post();
new Entity\User();
new Repository\PostRepository();
new Repository\UserRepository();
new Repository\Client\HttpRepository();

