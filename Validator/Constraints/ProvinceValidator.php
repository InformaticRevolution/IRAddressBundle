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
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use IR\Bundle\AddressBundle\Model\AddressInterface;

/**
 * Province Validator.
 *
 * @author Julien Kirsch <informatic.revolution@gmail.com>
 */
class ProvinceValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */       
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof AddressInterface) {
            throw new UnexpectedTypeException($value, 'IR\Bundle\AddressBundle\Model\AddressInterface');
        }        
        
        $country = $value->getCountry();
        if (null === $country || !$country->hasProvinces()) {
            return;
        }
        
        $province = $value->getProvince();
        if (null === $province || !$country->hasProvince($province)) {
            $this->context->addViolationAt('province', $constraint->message); 
        } 
    }    
}
