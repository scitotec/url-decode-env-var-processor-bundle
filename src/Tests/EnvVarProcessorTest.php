<?php

namespace Scitotec\UrlDecodeEnvVarProcessorBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EnvVarProcessorTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    public function testDecodesUrl() {
        $_ENV['PROCESSOR_TEST'] = '%23Hello%40World';
        $_ENV['PROCESSOR_TEST_URL'] = 'ftp://user:%C2%A7%40%20.%20%5E%C2%A7@example.com';
        self::bootKernel();

        $container = method_exists(self::class, 'getContainer') ? self::getContainer() : self::$container;
        $this->assertEquals('#Hello@World', $container->getParameter('processor_test'));
        $this->assertEquals('§@ . ^§', $container->getParameter('processor_test_url'));
    }
}