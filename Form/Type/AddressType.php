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
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

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
     * @var EventSubscriberInterface
     */
    protected $eventListener;


    /**
     * Constructor.
     *
     * @param string                   $class
     * @param EventSubscriberInterface $eventListener
     */
    public function __construct($class, EventSubscriberInterface $eventListener)
    {
        $this->class = $class;
        $this->eventListener = $eventListener;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array(
                'label' => 'ir_address.form.address.first_name',
            ))
            ->add('lastName', null, array(
                'label' => 'ir_address.form.address.last_name',
            ))
            ->add('street', null, array(
                'label' => 'ir_address.form.address.street',
            ))
            ->add('city', null, array(
                'label' => 'ir_address.form.address.city',
            ))
            ->add('postalCode', null, array(
                'label' => 'ir_address.form.address.postal_code',
            ))
            ->add('country', 'ir_zone_country_choice', array(
                'empty_value' => '',
                'label' => 'ir_address.form.address.country',
            ))
            ->add('phone', null, array(
                'label' => 'ir_address.form.address.phone',
            ))
            ->addEventSubscriber($this->eventListener);
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
