<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Enums\PostCategory;
use Hyde\Pages\MarkdownPost;
use Hyde\Support\ReadingTime;
use Illuminate\Support\Collection;

/**
 * Assembles the blog archive that the /posts page renders.
 *
 * The page ships every post in the HTML, since the filtering and pagination there are progressive
 * enhancements layered on top of the full list, so all the reading is done once and then cached
 * in a static property. Templates should never touch page objects for anything listed here.
 */
class BlogArchiveRepository
{
    /** @var \Illuminate\Support\Collection<int, array>|null Every dated post, newest first, as archive entries. */
    protected static ?Collection $entries = null;

    /**
     * Every post that can be placed on the timeline, newest first.
     *
     * Posts without a date are skipped, as a date-ordered archive has nowhere to put them.
     *
     * @return \Illuminate\Support\Collection<int, array>
     */
    public static function entries(): Collection
    {
        return static::$entries ??= MarkdownPost::getLatestPosts()
            ->filter(fn (MarkdownPost $post): bool => $post->date !== null)
            ->map(fn (MarkdownPost $post): array => static::describe($post))
            ->values();
    }

    /** The newest post, which the page highlights as the latest dispatch. */
    public static function featured(): ?array
    {
        return static::entries()->first();
    }

    /**
     * Every post except the featured one, which is what the year ledger lists.
     *
     * Each entry carries its position in the ledger, since the year groupings below scatter the
     * entries across several loops, while the client-side pagination counts them as one list.
     *
     * @return \Illuminate\Support\Collection<int, array>
     */
    public static function ledger(): Collection
    {
        return static::entries()
            ->skip(1)
            ->values()
            ->map(fn (array $entry, int $index): array => $entry + ['index' => $index]);
    }

    /**
     * The ledger entries grouped into the year headings they are listed under, newest year first.
     *
     * @return \Illuminate\Support\Collection<int, \Illuminate\Support\Collection<int, array>>
     */
    public static function ledgerByYear(): Collection
    {
        return static::ledger()->groupBy('year');
    }

    /**
     * How many posts each category has, in the order the categories are declared.
     *
     * Categories without any posts are left out, so the filter bar never offers a dead end.
     *
     * @return array<string, int> Category values mapped to their post count.
     */
    public static function categoryCounts(): array
    {
        $counts = static::entries()->countBy(fn (array $entry): string => $entry['category']->value);

        return collect(PostCategory::cases())
            ->mapWithKeys(fn (PostCategory $category): array => [$category->value => $counts->get($category->value, 0)])
            ->filter()
            ->all();
    }

    /** The year of the oldest post, used for the "Est." line in the masthead. */
    public static function firstYear(): int
    {
        return static::entries()->min('year') ?? (int) date('Y');
    }

    /** Flatten a post into the values the archive page needs, so the template stays declarative. */
    protected static function describe(MarkdownPost $post): array
    {
        return [
            'route' => $post->getRoute(),
            // The property, not title(), which prefixes the site name for use in the document title.
            'title' => $post->title,
            'description' => $post->description,
            'category' => PostCategory::from($post->category),
            'author' => $post->author,
            'guest' => (bool) $post->matter('guest_post', false),
            'year' => (int) $post->date->format('Y'),
            'day' => $post->date->format('M d'),
            'datetime' => $post->date->datetime,
            'date' => $post->date->format('F j, Y'),
            'minutes' => max(1, ReadingTime::fromString($post->markdown->body())->getMinutes()),
        ];
    }
}
