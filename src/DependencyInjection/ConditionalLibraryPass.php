<?php

namespace Drutiny\DependencyInjection;

use AsyncAws\Core\AwsClientFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class ConditionalLibraryPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        if (class_exists(AwsClientFactory::class) && !$container->has(AwsClientFactory::class)) {
            $container->addDefinitions([new Definition(AwsClientFactory::class)]);
        }
    }
}