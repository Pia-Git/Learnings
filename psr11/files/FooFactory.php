<?php

declare(strict_types=1);

namespace psr11\files;

class FooFactory
{
    public function __invoke(int $dependency)
    {
        return new Foo($dependency);
    }
}
