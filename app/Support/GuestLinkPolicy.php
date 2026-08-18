<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Adds conservative rel attributes to links inside guest-authored content.
 *
 * Guest posts aren't editorially reviewed the way staff posts are, so every link a guest author
 * included carries no SEO weight and opens with no window handle to trust, whatever the link.
 */
class GuestLinkPolicy
{
    public const REL = 'nofollow ugc noopener noreferrer';

    /** Apply {@see REL} to every link tag in an HTML string, merging with any rel it already has. */
    public static function markLinks(string $html): string
    {
        return preg_replace_callback('/<a\b[^>]*>/i', static fn (array $match): string => static::withRel($match[0]), $html);
    }

    protected static function withRel(string $tag): string
    {
        if (preg_match('/\srel=(["\'])(.*?)\1/i', $tag, $match)) {
            $rels = array_unique(array_merge(preg_split('/\s+/', trim($match[2])), explode(' ', static::REL)));

            return str_replace($match[0], ' rel="'.implode(' ', $rels).'"', $tag);
        }

        return substr($tag, 0, -1).' rel="'.static::REL.'">';
    }
}
