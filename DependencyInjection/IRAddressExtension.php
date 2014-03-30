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

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

/**
 * Address Extension.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class IRAddressExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('driver/%s/address.xml', $config['db_driver']));
 
        $container->setParameter('ir_address.db_driver', $config['db_driver']);
        $container->setParameter('ir_address.model.address.class', $config['address_class']);
        $container->setParameter('ir_address.backend_type_' . $config['db_driver'], true);
        
        $container->setAlias('ir_address.manager.address', $config['address_manager']);
        
        if (!empty($config['address'])) {
            $this->loadAddress($config['address'], $container, $loader);
        }             
    }   
    
    private function loadAddress(array $config, ContainerBuilder $container, XmlFileLoader $loader)
    {        
        $loader->load('address.xml');
        
        $container->setParameter('ir_address.form.name.address', $config['form']['name']);
        $container->setParameter('ir_address.form.type.address', $config['form']['type']);
        $container->setParameter('ir_address.form.validation_groups.address', $config['form']['validation_groups']);
    }     
}
