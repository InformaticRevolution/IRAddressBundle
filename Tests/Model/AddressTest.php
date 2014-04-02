<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Tests\Model;

use IR\Bundle\AddressBundle\Model\AddressInterface;
use IR\Bundle\AddressBundle\Model\CountryInterface;

/**
 * Address Test.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getSimpleTestData
     */
    public function testSimpleSettersGetters($property, $value, $default)
    {
        $getter = 'get'.$property;
        $setter = 'set'.$property;
        
        $address = $this->getAddress();
        
        $this->assertEquals($default, $address->$getter());
        $address->$setter($value);
        $this->assertEquals($value, $address->$getter());
    }
    
    public function getSimpleTestData()
    {
        return array(
            array('firstName', 'James', null),
            array('lastName', 'Brown', null),
            array('companyName', 'Apple Inc', null),
            array('street', '439 Karley Loaf Suite', null),
            array('division', 'NewYork', null),
            array('postalCode', '63419', null),
            array('city', 'New York', null),
            array('country', $this->getCountry(), null),
            array('phone', '132-149-0269', null),
            array('createdAt', new \DateTime(), null),
            array('updatedAt', new \DateTime(), null),              
        );
    }      
    
    /**
     * @return AddressInterface
     */
    protected function getAddress()
    {
        return $this->getMockForAbstractClass('IR\Bundle\AddressBundle\Model\Address');
    } 
    
    /**
     * @return CountryInterface
     */
    protected function getCountry()
    {
        return $this->getMockForAbstractClass('IR\Bundle\AddressBundle\Model\CountryInterface');
    }     
}
