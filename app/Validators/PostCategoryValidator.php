<?php

declare(strict_types=1);

namespace App\Validators;

use App\Enums\PostCategory;
use Hyde\Pages\MarkdownPost;
use RuntimeException;

class PostCategoryValidator implements SiteValidation
{
    public function validate(): void
    {
        $invalidPosts = MarkdownPost::all()
            ->filter(fn (MarkdownPost $post): bool => PostCategory::tryFrom($post->category ?? '') === null)
            ->map(fn (MarkdownPost $post): string => MarkdownPost::sourcePath($post->identifier))
            ->values();

        if ($invalidPosts->isEmpty()) {
            return;
        }

        $validCategories = implode(', ', array_column(PostCategory::cases(), 'value'));

        throw new RuntimeException(sprintf(
            "The following blog posts are missing a valid category:\n- %s\n\nValid categories: %s",
            $invalidPosts->implode("\n- "),
            $validCategories,
        ));
    }
}
