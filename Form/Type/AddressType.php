<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Address Type.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class AddressType extends AbstractType
{
    /**
     * @var string
     */         
    protected $class;

    
    /**
     * Constructor.
     * 
     * @param string  $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }    
    
    /**
     * {@inheritDoc}
     */    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder           
            ->add('firstName', null, array(                 
                'label' => 'form.address.first_name',
                'translation_domain' => 'ir_address',
            )) 
            ->add('lastName', null, array(                 
                'label' => 'form.address.last_name',
                'translation_domain' => 'ir_address',
            )) 
            ->add('companyName', null, array(                 
                'label' => 'form.address.company_name',
                'translation_domain' => 'ir_address',
            ))                 
            ->add('street', null, array(
                'label' => 'form.address.street', 
                'translation_domain' => 'ir_address',
            ))
            ->add('division', null, array(
                'label' => 'form.address.division', 
                'translation_domain' => 'ir_address',
            ))                   
            ->add('postalCode', null, array(
                'label' => 'form.address.postal_code', 
                'translation_domain' => 'ir_address',
            ))                
            ->add('city', null, array(
                'label' => 'form.address.city',
                'translation_domain' => 'ir_address',
            ))
            ->add('country', 'country', array(
                'empty_value' => '',
                'label' => 'form.address.country', 
                'translation_domain' => 'ir_address',
            ))  
            ->add('homePhone', null, array(
                'label' => 'form.address.home_phone', 
                'translation_domain' => 'ir_address',
            ))  
            ->add('mobilePhone', null, array(
                'label' => 'form.address.mobile_phone', 
                'translation_domain' => 'ir_address',
            ));
    }

    /**
     * {@inheritdoc}
     */       
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'address',
        ));        
    }       
    
    /**
     * {@inheritDoc}
     */    
    public function getName()
    {
        return 'ir_address';
    }    
}
