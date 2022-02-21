<?php

declare(strict_types=1);

namespace psr11;

require '../vendor/autoload.php';

use Psr\Container\ContainerInterface;

/**
 * needs composer package 'psr/container'
 */
class ServiceManager implements ContainerInterface
{
    private array $factories;

    public function __construct(array $factories)
    {
        $this->factories = $factories;
    }

    public function get(string $id)
    {
        if ($this->has($id)) {
            return (new $this->factories[$id])(rand(0, 100));
        }

        return null;
    }

    public function has(string $id): bool
    {
        return (bool) $this->factories[$id] ?? false;
    }
}
