<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Tests\Manager;

use IR\Bundle\AddressBundle\Manager\AddressManagerInterface;

/**
 * Address Manager Test.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class AddressManagerTest extends \PHPUnit_Framework_TestCase
{
    const ADDRESS_CLASS = 'IR\Bundle\AddressBundle\Tests\TestAddress';
 
    /**
     * @var AddressManagerInterface
     */
    protected $addressManager;      
    
    
    public function setUp()
    {
        $this->addressManager = $this->getMockForAbstractClass('IR\Bundle\AddressBundle\Manager\AddressManager');
        
        $this->addressManager->expects($this->any())
            ->method('getClass')
            ->will($this->returnValue(static::ADDRESS_CLASS));        
    }
    
    public function testCreateAddress()
    {        
        $address = $this->addressManager->createAddress();
        
        $this->assertInstanceOf(static::ADDRESS_CLASS, $address);
    }    
}
