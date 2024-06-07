<?php

declare(strict_types=1);

namespace App\Extend;

/**
 * Experimental typed data collections class extension.
 */
class DataCollections extends \Hyde\Support\DataCollections
{
    public static function yaml(string $name): static
    {
        return parent::yaml($name);
    }
}
