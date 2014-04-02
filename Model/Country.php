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
 * Abstract Country implementation.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
abstract class Country implements CountryInterface
{
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $isoCode;
    
    /**
     * @var Boolean
     */
    protected $enabled = true;
    
 
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
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
    }
    
    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }    
    
    /**
     * {@inheritdoc}
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }            
}
