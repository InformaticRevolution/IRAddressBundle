<?php

/*
 * This file is part of the IRAddressBundle package.
 *
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This class contains the configuration information for the bundle.
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 * 
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ir_address');

        $supportedDrivers = array('orm');
        
        $rootNode
            ->children()
                ->scalarNode('db_driver')
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The driver %s is not supported. Please choose one of '.json_encode($supportedDrivers))
                    ->end()
                    ->cannotBeOverwritten()
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()  
                ->scalarNode('address_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('address_manager')->defaultValue('ir_address.manager.address.default')->end()
            ->end();            
        
        $this->addAddressSection($rootNode);
        
        return $treeBuilder;
    }
    
    private function addAddressSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('address')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('ir_address')->end()
                                ->scalarNode('name')->defaultValue('ir_address_form')->end()
                                ->arrayNode('validation_groups')
                                    ->prototype('scalar')->end()
                                    ->defaultValue(array('Address', 'Default'))
                                ->end()                
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }   
}
