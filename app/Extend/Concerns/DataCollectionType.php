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
        $schema = static::schema();

        foreach ($data as $key => $value) {
            // Todo: Validate the key against the class properties
            //       - Validate all required properties are set
            //       - Validate properties are set to the correct type
            // Todo: Set nullable properties to null if not set
            // Todo: Add method hooks to run before/after construction

            $this->{$key} = $value;
        }
    }

    protected static function schema(): array
    {
        // Get the class properties and their types using reflection

        $reflection = new \ReflectionClass(static::class);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        $schema = [];

        foreach ($properties as $property) {
            $schema[$property->getName()] = $property->getType()->getName();
        }

        return $schema;
    }
}
