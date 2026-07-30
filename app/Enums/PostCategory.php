<?php

namespace App\Enums;

enum PostCategory: string
{
    case Devlog = 'devlog';
    case Release = 'release';
    case Tutorial = 'tutorial';
    case Essay = 'essay';

    /**
     * Get the formatted display name for the category.
     */
    public function label(): string
    {
        return match($this) {
            self::Devlog => 'Devlog',
            self::Release => 'Release',
            self::Tutorial => 'Tutorial',
            self::Essay => 'Essay',
        };
    }

    /**
     * Get the display name used when the category names a group of posts, rather than a single one.
     */
    public function pluralLabel(): string
    {
        return match($this) {
            self::Devlog => 'Devlogs',
            self::Release => 'Releases',
            self::Tutorial => 'Tutorials',
            self::Essay => 'Essays',
        };
    }

    /**
     * Get the HEX text color used in the HTML.
     */
    public function textColor(): string
    {
        return match($this) {
            self::Devlog => '#8d7bf5',
            self::Release => '#d6a24a',
            self::Tutorial, self::Essay => '#a49cba',
        };
    }

    /**
     * Get the RGBA border color used in the HTML.
     */
    public function borderColor(): string
    {
        return match($this) {
            self::Devlog => 'rgba(141, 123, 245, .4)',
            self::Release => 'rgba(214, 162, 74, .4)',
            self::Tutorial, self::Essay => 'rgba(164, 156, 186, .16)',
        };
    }
    
    /**
     * Get a combined array of all styles, useful for Blade components.
     */
    public function styles(): array
    {
        return [
            'text' => $this->textColor(),
            'border' => $this->borderColor(),
        ];
    }
}
