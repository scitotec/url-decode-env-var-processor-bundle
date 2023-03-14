<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Scitotec\UrlDecodeEnvVarProcessorBundle\EnvVarProcessor;

return static function (ContainerConfigurator $container) {
    $container->services()
        ->set('scitotec_url_decode_env_var_processor.processor', EnvVarProcessor::class)
            ->tag('container.env_var_processor')
    ;
};
