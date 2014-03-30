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

use IR\Bundle\AddressBundle\Model\AddressInterface;

/**
 * Address Manager Interface.
 * 
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
interface AddressManagerInterface 
{
    /**
     * Creates an empty address instance.
     *
     * @return AddressInterface
     */
    public function createAddress();    

    /**
     * Updates an address.
     *
     * @param AddressInterface $address
     */
    public function updateAddress(AddressInterface $address);    

    /**
     * Deletes an address.
     *
     * @param AddressInterface $address
     */
    public function deleteAddress(AddressInterface $address);       
    
    /**
     * Finds an address by the given criteria.
     *
     * @param array $criteria
     *
     * @return AddressInterface|null
     */
    public function findAddressBy(array $criteria);      
    
    /**
     * Returns the addresses' fully qualified class name.
     *
     * @return string
     */
    public function getClass();    
}
