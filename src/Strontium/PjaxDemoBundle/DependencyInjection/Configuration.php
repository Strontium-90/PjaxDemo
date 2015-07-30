<?php

namespace Strontium\PjaxDemoBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('strontium_pjax_demo');
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
                ->arrayNode('templates')
                    ->prototype('scalar')->end()
                ->end()
            ->end()


        ;
        $this->addClassesSection($rootNode);
        $this->addValidationGroupsSection($rootNode);
        return $treeBuilder;
    }

                         /**
     * Adds `validation_groups` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addValidationGroupsSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('validation_groups')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('message')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('Default'))
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
    /**
     * Adds `classes` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addClassesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('classes')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('message')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Strontium\PjaxDemoBundle\Model\Message')->end()
                                ->scalarNode('controller')->defaultValue('%sylius.controller.class%')->end()
                                ->scalarNode('repository')->end()
                                ->arrayNode('form')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('default')->defaultValue('Strontium\PjaxDemoBundle\Form\Type\MessageType')->end()
                                        ->scalarNode('choice')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
            ->end()
        ;
    }
}
