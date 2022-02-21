<?php

declare(strict_types=1);

use psr11\Files\Foo;
use psr11\files\FooFactory;
use psr11\ServiceManager;

require 'ServiceManager.php';
require 'files/Foo.php';
require 'files/FooFactory.php';
//require '../vendor/autoload.php';

// information about psr11: https://www.php-fig.org/psr/psr-11/

$factories = [Foo::class => FooFactory::class];

$manager = new ServiceManager($factories);

$ivan = $manager->get(Foo::class);
echo $ivan->getId() . PHP_EOL;
$ivan = $manager->get(Foo::class);
echo $ivan->getId() . PHP_EOL;
$ivan = $manager->get(Foo::class);
echo $ivan->getId() . PHP_EOL;

