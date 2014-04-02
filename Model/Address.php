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
 * Abstract Address implementation.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
abstract class Address implements AddressInterface
{
    /**
     * @var mixed
     */
    protected $id;    

    /**
     * @var string
     */
    protected $firstName;
    
    /**
     * @var string
     */
    protected $lastName;    
    
    /**
     * @var string
     */
    protected $companyName;
   
    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $division;     
    
    /**
     * @var string
     */
    protected $postalCode; 
      
    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;  
     
    /**
     * @var string
     */
    protected $phone;  

    /**
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @var \Datetime
     */
    protected $updatedAt;
    
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getLastName()  
    {
        return $this->lastName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setCompanyName($companyName)  
    {
        $this->companyName = $companyName;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setStreet($street)  
    {
        $this->street = $street;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getDivision()
    {
        return $this->division;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDivision($division)    
    {
        $this->division = $division;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPostalCode($postalCode) 
    {
        $this->postalCode = $postalCode;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setCountry($country)   
    {
        $this->country = $country;
    }
        
    /**
     * {@inheritdoc}
     */
    public function getPhone()
    {
        return $this->phone;
    }            

    /**
     * {@inheritdoc}
     */
    public function setPhone($phone) 
    {
        $this->phone = $phone;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\Datetime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt(\Datetime $updatedAt = null) 
    {
        $this->updatedAt = $updatedAt;
    }    
}
