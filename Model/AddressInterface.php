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

use IR\Bundle\ZoneBundle\Model\CountryInterface;
use IR\Bundle\ZoneBundle\Model\ProvinceInterface;

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
     * Returns the province.
     *
     * @return ProvinceInterface
     */
    public function getProvince();

    /**
     * Sets the province.
     *
     * @param ProvinceInterface|null $province
     */
    public function setProvince(ProvinceInterface $province = null);

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
     * Returns the country.
     *
     * @return CountryInterface
     */
    public function getCountry();

    /**
     * Sets the country.
     *
     * @param CountryInterface|null $country
     */
    public function setCountry(CountryInterface $country = null);

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
}
