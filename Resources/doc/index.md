Getting Started With IRAddressBundle
====================================

## Prerequisites

This version of the bundle requires Symfony 2.3+.

## Installation

1. Download IRAddressBundle using composer
2. Enable the Bundle
3. Create your Address class
4. Configure the IRAddressBundle
5. Update your database schema
6. Enable the doctrine extensions

### Step 1: Download IRAddressBundle using composer

Add IRAddressBundle in your composer.json:

``` js
{
    "require": {
        "informaticrevolution/address-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update informaticrevolution/address-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new IR\Bundle\AddressBundle\IRAddressBundle(),
    );
}
```

### Step 3: Create your Address class

##### Annotations

``` php
<?php
// src/Acme/AddressBundle/Entity/Address.php

namespace Acme\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use IR\Bundle\AddressBundle\Model\Address as BaseAddress;

/**
 * @ORM\Entity
 * @ORM\Table(name="acme_address")
 */
class Address extends BaseAddress
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
```

##### Yaml or Xml

``` php
<?php
// src/Acme/AddressBundle/Entity/Address.php

namespace Acme\AddressBundle\Entity;

use IR\Bundle\AddressBundle\Model\Address as BaseAddress;

/**
 * Address
 */
class Address extends BaseAddress
{
}
```

In YAML:

``` yaml
# src/Acme/AddressBundle/Resources/config/doctrine/Address.orm.yml
Acme\AddressBundle\Entity\Address:
    type:  entity
    table: acme_address
    id:
        id:
            type: integer
            generator:
                strategy: AUTO
```

In XML:

``` xml
<!-- src/Acme/AddressBundle/Resources/config/doctrine/Address.orm.xml -->
<?xml version="1.0" encoding="UTF-8"?>

<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <entity name="Acme\AddressBundle\Entity\Address" table="acme_address">
        <id name="id" type="integer" column="id">
            <generator strategy="AUTO" />
        </id> 
    </entity>
    
</doctrine-mapping>
```

### Step 4: Configure the IRAddressBundle

Add the bundle minimum configuration to your `config.yml` file:

``` yaml
# app/config/config.yml
ir_address:
    db_driver: orm # orm is the only available driver for the moment 
    address_class: Acme\AddressBundle\Entity\Address
```

### Step 5: Update your database schema

Run the following command:

``` bash
$ php app/console doctrine:schema:update --force
```

### Step 6: Enable the doctrine extensions

**a) Enable the stof doctrine extensions bundle in the kernel**

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
    );
}
```

**b) Enable the timestampable extension in your `config.yml` file**

``` yaml
# app/config/config.yml
stof_doctrine_extensions:
    orm:
        default:
            timestampable: true
```