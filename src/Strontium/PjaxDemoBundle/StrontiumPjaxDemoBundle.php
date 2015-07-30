<?php

namespace Strontium\PjaxDemoBundle;

use Strontium\PjaxDemoBundle\DependencyInjection\Compiler\MenuCompilerPass;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class StrontiumPjaxDemoBundle extends AbstractResourceBundle
{
    protected $mappingFormat = self::MAPPING_YAML;

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new  MenuCompilerPass());
    }


    /**
     * {@inheritdoc}
     */
    protected function getConfigFilesPath()
    {
        return sprintf(
            '%s/Resources/config/doctrine',
            $this->getPath()
        );
    }

    /**
     * Return array of currently supported drivers.
     *
     * @return array
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Strontium\PjaxDemoBundle\Model';
    }


    protected function getBundlePrefix()
    {
        return 'strontium_pjax_demo';
    }
}
