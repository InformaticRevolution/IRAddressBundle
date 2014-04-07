<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Tests\DependencyInjection;

use Symfony\Component\Yaml\Parser;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use IR\Bundle\AddressBundle\DependencyInjection\IRAddressExtension;

/**
 * Address Extension Test.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class IRAddressExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** 
     * @var ContainerBuilder
     */
    protected $configuration;
    
    
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testAddressLoadThrowsExceptionUnlessDatabaseDriverSet()
    {
        $loader = new IRAddressExtension();
        $config = $this->getEmptyConfig();
        unset($config['db_driver']);
        $loader->load(array($config), new ContainerBuilder());
    }  
    
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testAddressLoadThrowsExceptionUnlessDatabaseDriverIsValid()
    {
        $loader = new IRAddressExtension();
        $config = $this->getEmptyConfig();
        $config['db_driver'] = 'foo';
        $loader->load(array($config), new ContainerBuilder());
    }    
    
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testAddressLoadThrowsExceptionUnlessAddressModelClassSet()
    {
        $loader = new IRAddressExtension();
        $config = $this->getEmptyConfig();
        unset($config['address_class']);
        $loader->load(array($config), new ContainerBuilder());
    } 

    public function testDisableAddress()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new IRAddressExtension();
        $config = $this->getEmptyConfig();
        $config['address'] = false;
        $loader->load(array($config), $this->configuration);
        $this->assertNotHasDefinition('ir_address.form.address');
    }

    public function testAddressLoadModelClassWithDefaults()
    {
        $this->createEmptyConfiguration();

        $this->assertParameter('Acme\AddressBundle\Entity\Address', 'ir_address.model.address.class');
    }        

    public function testAddressLoadModelClass()
    {
        $this->createFullConfiguration();

        $this->assertParameter('Acme\AddressBundle\Entity\Address', 'ir_address.model.address.class');
    }      
    
    public function testAddressLoadManagerClassWithDefaults()
    {
        $this->createEmptyConfiguration();

        $this->assertParameter('orm', 'ir_address.db_driver');
        $this->assertAlias('ir_address.manager.address.default', 'ir_address.manager.address');
    }   
    
    public function testAddressLoadManagerClass()
    {
        $this->createFullConfiguration();

        $this->assertParameter('orm', 'ir_address.db_driver');
        $this->assertAlias('acme_address.manager.address', 'ir_address.manager.address');
    }       
    
    public function testAddressLoadFormClassWithDefaults()
    {
        $this->createEmptyConfiguration();

        $this->assertParameter('ir_address', 'ir_address.form.type.address');
    }     
    
    public function testAddressLoadFormClass()
    {
        $this->createFullConfiguration();

        $this->assertParameter('acme_address', 'ir_address.form.type.address');
    }    
 
    public function testAddressLoadFormNameWithDefaults()
    {
        $this->createEmptyConfiguration();

        $this->assertParameter('ir_address_form', 'ir_address.form.name.address');
    }

    public function testAddressLoadFormName()
    {
        $this->createFullConfiguration();

        $this->assertParameter('acme_address_form', 'ir_address.form.name.address');
    }

    public function testAddressLoadFormServiceWithDefaults()
    {
        $this->createEmptyConfiguration();

        $this->assertHasDefinition('ir_address.form.address');
    }

    public function testAddressLoadFormService()
    {
        $this->createFullConfiguration();

        $this->assertHasDefinition('ir_address.form.address'); 
    }

    protected function createEmptyConfiguration()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new IRAddressExtension();
        $config = $this->getEmptyConfig();
        $loader->load(array($config), $this->configuration);
        $this->assertTrue($this->configuration instanceof ContainerBuilder);
    }      
    
    protected function createFullConfiguration()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new IRAddressExtension();
        $config = $this->getFullConfig();
        $loader->load(array($config), $this->configuration);
        $this->assertTrue($this->configuration instanceof ContainerBuilder);
    }        
    
    /**
     * @return array
     */
    protected function getEmptyConfig()
    {
        $parser = new Parser();
        
        return $parser->parse(file_get_contents(__DIR__.'/Fixtures/minimal_config.yml'));
    }    
    
    /**
     * @return array
     */    
    protected function getFullConfig()
    {
        $parser = new Parser();

        return $parser->parse(file_get_contents(__DIR__.'/Fixtures/full_config.yml'));
    }     
    
    /**
     * @param string $value
     * @param string $key
     */
    private function assertAlias($value, $key)
    {
        $this->assertEquals($value, (string) $this->configuration->getAlias($key), sprintf('%s alias is correct', $key));
    }      
     
    /**
     * @param mixed  $value
     * @param string $key
     */
    private function assertParameter($value, $key)
    {
        $this->assertEquals($value, $this->configuration->getParameter($key), sprintf('%s parameter is incorrect', $key));
    }    
    
    /**
     * @param string $id
     */
    private function assertHasDefinition($id)
    {
        $this->assertTrue(($this->configuration->hasDefinition($id) ?: $this->configuration->hasAlias($id)));
    }      
    
    /**
     * @param string $id
     */
    private function assertNotHasDefinition($id)
    {
        $this->assertFalse(($this->configuration->hasDefinition($id) ?: $this->configuration->hasAlias($id)));
    }    
            
    protected function tearDown()
    {
        unset($this->configuration);
    }     
}
