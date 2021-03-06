<?php

/*
 * This file is part of the IRAddressBundle package.
 *
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

/**
 * This bundle provides simple architecture for addresses management.
 * 
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class IRAddressBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */    
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        
        $this->addRegisterMappingsPass($container);
    }    
    
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        $mappings = array(
            realpath(__DIR__ . '/Resources/config/doctrine/model') => 'IR\Bundle\AddressBundle\Model',
        );   
        
        $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappings, array('ir_address.model_manager_name'), 'ir_address.backend_type_orm'));     
    }        
}
