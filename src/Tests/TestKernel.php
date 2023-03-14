<?php

namespace Scitotec\UrlDecodeEnvVarProcessorBundle\Tests;

use Scitotec\UrlDecodeEnvVarProcessorBundle\ScitotecUrlDecodeEnvVarProcessorBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new ScitotecUrlDecodeEnvVarProcessorBundle();
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->loadFromExtension('framework', [
                'test' => true,
            ]);
            $container->setParameter('processor_test', '%env(url_decode:PROCESSOR_TEST)%');
            $container->setParameter('processor_test_url', '%env(string:url_decode:key:pass:url:PROCESSOR_TEST_URL)%');
        });
    }
}