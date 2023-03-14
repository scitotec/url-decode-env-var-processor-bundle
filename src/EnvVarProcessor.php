<?php


namespace Scitotec\UrlDecodeEnvVarProcessorBundle;

use Closure;
use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class EnvVarProcessor implements EnvVarProcessorInterface
{

    public static function getProvidedTypes(): array
    {
        return [
            'url_decode' => 'string',
        ];
    }

    public function getEnv($prefix, $name, Closure $getEnv): ?string
    {
        $env = $getEnv($name);

        if (null === $env) {
            return null;
        }

        return urldecode($env);
    }
}
