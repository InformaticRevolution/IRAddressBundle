<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Manager;

/**
 * Abstract Country Manager.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
abstract class CountryManager implements CountryManagerInterface
{
    /**
     * {@inheritDoc}
     */    
    public function createCountry()
    {
        $class = $this->getClass();

        return new $class();
    }      
}
