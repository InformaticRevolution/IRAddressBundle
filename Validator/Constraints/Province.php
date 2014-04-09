<?php

/*
 * This file is part of the IRAddressBundle package.
 * 
 * (c) Julien Kirsch <informatic.revolution@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IR\Bundle\AddressBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Province Constraint.
 *
 * @Annotation
 * 
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class Province extends Constraint
{
    public $message = 'Please select a province.';

    /**
     * {@inheritDoc}
     */
    public function getTargets()
    {
        return static::CLASS_CONSTRAINT;
    }        
}
