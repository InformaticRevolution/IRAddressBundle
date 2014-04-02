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

use IR\Bundle\AddressBundle\Model\Country;

/**
 * Country Test.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class CountryTest extends \PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $country = $this->getCountry();
        
        $this->assertTrue($country->isEnabled());
        $country->setEnabled(false);
        $this->assertFalse($country->isEnabled());
    }
    
    /**
     * @dataProvider getSimpleTestData
     */
    public function testSimpleSettersGetters($property, $value, $default)
    {
        $getter = 'get'.$property;
        $setter = 'set'.$property;
        
        $country = $this->getCountry();
        
        $this->assertEquals($default, $country->$getter());
        $country->$setter($value);
        $this->assertEquals($value, $country->$getter());
    }
    
    public function getSimpleTestData()
    {
        return array(
            array('name', 'France', null),
            array('isoCode', 'FR', null),
        );
    }      
    
    /**
     * @return Country
     */
    protected function getCountry()
    {
        return $this->getMockForAbstractClass('IR\Bundle\AddressBundle\Model\Country');
    }      
}
