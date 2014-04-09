<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use IR\Bundle\ZoneBundle\Manager\CountryManagerInterface;

/**
 * Build Address Form Listener.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class BuildAddressFormListener implements EventSubscriberInterface
{
    /**
     * @var CountryManagerInterface
     */
    private $countryManager;
    
    
    /**
     * Constructor.
     *
     * @param CountryManagerInterface $countryManager
     */
    public function __construct(CountryManagerInterface $countryManager)
    {
        $this->countryManager = $countryManager;
    }    
    
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }    
    
    /**
     * Removes or adds a province field based on the country set.
     *
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $address = $event->getData();
        if (null === $address) {
            return;
        }
        
        $country = $address->getCountry();
        if (null === $country) {
            return;
        }        
        
        if (!$country->getProvinces()->isEmpty()) {
            $form = $event->getForm();
            
            $form->add('province', 'ir_zone_province_choice', array(
                'empty_value' => '',
                'country' => $country, 
                'label'   => 'ir_address.form.address.province',
            ));
        }      
    } 
    
    /**
     * Removes or adds a province field based on the country set on submitted form.
     *
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        
        if (!is_array($data) || !array_key_exists('country', $data)) {
            return;
        }

        $country = $this->countryManager->findCountryBy(array('id' => $data['country']));
        if (null === $country) {
            return;
        }

        if (!$country->getProvinces()->isEmpty()) {
            $form = $event->getForm();
            
            $form->add('province', 'ir_zone_province_choice', array(
                'empty_value' => '',
                'country' => $country, 
                'label'   => 'ir_address.form.address.province',
            ));
        }
    }    
}
