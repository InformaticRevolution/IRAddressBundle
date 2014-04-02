<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Model;

/**
 * Address Interface.
 * 
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
interface AddressInterface 
{
    /**
     * Returns the id.
     * 
     * @return mixed
     */
    public function getId(); 
    
    /**
     * Returns the first name.
     *
     * @return string 
     */
    public function getFirstName(); 
            
    /**
     * Sets the first name.
     *
     * @param string $firstName
     */
    public function setFirstName($firstName);
    
    /**
     * Returns the last name.
     *
     * @return string 
     */
    public function getLastName();  
    
    /**
     * Sets the last name.
     *
     * @param string $lastName
     */
    public function setLastName($lastName); 

    /**
     * Returns the company name.
     *
     * @return string
     */
    public function getCompanyName();

    /**
     * Sets the company name.
     *
     * @param string $companyName
     */
    public function setCompanyName($companyName);    

    /**
     * Returns the street.
     *
     * @return string
     */
    public function getStreet();

    /**
     * Sets the street.
     *
     * @param string $street
     */
    public function setStreet($street);  
    
    /**
     * Returns the administrative division.
     *
     * @return string
     */
    public function getDivision();

    /**
     * Sets the administrative division.
     *
     * @param string $division
     */
    public function setDivision($division);    
        
    /**
     * Returns the postal code.
     *
     * @return string
     */
    public function getPostalCode();

    /**
     * Sets the postal code.
     *
     * @param string $postalCode
     */
    public function setPostalCode($postalCode); 
    
    /**
     * Returns the city.
     *
     * @return string
     */
    public function getCity();

    /**
     * Sets the city.
     *
     * @param string $city
     */
    public function setCity($city);
    
    /**
     * Returns the country.
     *
     * @return CountryInterface
     */
    public function getCountry();

    /**
     * Sets the country.
     *
     * @param CountryInterface $country
     */
    public function setCountry(CountryInterface $country);    
    
    /**
     * Returns the phone.
     *
     * @return string
     */
    public function getPhone();

    /**
     * Sets the phone.
     *
     * @param string $phone
     */
    public function setPhone($phone); 

    /**
     * Returns the creation time.
     *
     * @return \Datetime
     */
    public function getCreatedAt();   
    
    /**
     * Sets the creation time.
     * 
     * @param \Datetime $createdAt
     */
    public function setCreatedAt(\Datetime $createdAt);    
    
    /**
     * Returns the last update time.
     *
     * @return \Datetime
     */
    public function getUpdatedAt();  
    
    /**
     * Sets the last update time.
     * 
     * @param \Datetime|null $updatedAt
     */
    public function setUpdatedAt(\Datetime $updatedAt = null);       
}
