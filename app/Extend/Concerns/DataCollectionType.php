<?php

namespace App\Extend\Concerns;

/**
 * Contract for a custom data collection types.
 *
 * Types are added by adding a `type.php` file in the collection directory.
 * The type should return a new anonymous class. While they are currently not checked against this type,
 * it's recommended to extend this class to ensure compatible constructors and utilize automatic deserialization.
 */
abstract class DataCollectionType
{
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            // Todo: Validate the key against the class properties
            //       - Validate all required properties are set
            //       - Validate properties are set to the correct type
            // Todo: Set nullable properties to null if not set

            $this->{$key} = $value;
        }
    }
}
