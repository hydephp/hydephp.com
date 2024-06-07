<?php

namespace App\Extend\Concerns;

/**
 * Contract for a custom data collection types.
 *
 * Types are added by adding a `type.php` file in the collection directory.
 * The type should return a new anonymous class. While they are currently not checked against this type,
 * it's recommended to implement this interface to ensure compatible constructors.
 */
interface DataCollectionType
{
    public function __construct(array $data);
}
