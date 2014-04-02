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
 * Country Type.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class CountryType extends AbstractType
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
            ->add('name', null, array(                 
                'label' => 'form.country.name',
                'translation_domain' => 'ir_address',
            )) 
            ->add('isoCode', null, array(                 
                'label' => 'form.country.iso_code',
                'translation_domain' => 'ir_address',
            )) 
            ->add('enabled', null, array(                 
                'label' => 'form.country.enabled',
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
            'intention' => 'country',
        ));        
    }       
    
    /**
     * {@inheritDoc}
     */    
    public function getName()
    {
        return 'ir_address_country';
    }    
}
