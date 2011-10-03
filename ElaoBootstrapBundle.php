<?php

namespace Elao\BootstrapBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class ElaoBootstrapBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataAdminBundle';
    }
}
