<?php
namespace Strontium\PjaxDemoBundle\DependencyInjection\Compiler;

use Knp\Menu\Util\MenuManipulator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class MenuCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $container->getDefinition('knp_menu.helper')
                  ->addArgument(new Definition('Knp\Menu\Util\MenuManipulator'));
    }
}
