<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomepageStatistics
{
    protected const CACHE_KEY = 'homepage.statistics';

    protected const ANALYTICS_URL = 'https://ci.hydephp.com/api/analytics';

    protected const GITHUB_REPOSITORY_URL = 'https://api.github.com/repos/hydephp/hyde';

    /**
     * Get the homepage statistics as presentation-ready cards.
     *
     * @return list<array{value: string, suffix: string|null, label: string}>
     */
    public static function cards(): array
    {
        $statistics = Cache::store('file')->remember(
            static::CACHE_KEY,
            now()->addDay(),
            fn (): array => static::fetch(),
        );

        return [
            static::card($statistics['githubClones'], 'GitHub clones'),
            static::card($statistics['packagistInstalls'], 'Packagist installs'),
            static::card($statistics['githubStars'], 'GitHub stars'),
            ['value' => 'MIT', 'suffix' => null, 'label' => 'Licensed, forever'],
        ];
    }

    /** @return array{githubClones: int, packagistInstalls: int, githubStars: int} */
    protected static function fetch(): array
    {
        $analytics = Http::timeout(10)
            ->retry(2, 250)
            ->get(static::ANALYTICS_URL)
            ->throw()
            ->json('data.summary');

        $repository = Http::timeout(10)
            ->retry(2, 250)
            ->withHeaders([
                'Accept' => 'application/vnd.github+json',
                'X-GitHub-Api-Version' => '2022-11-28',
            ])
            ->get(static::GITHUB_REPOSITORY_URL)
            ->throw()
            ->json();

        return [
            'githubClones' => (int) $analytics['githubClones'],
            'packagistInstalls' => (int) $analytics['packagistInstalls'],
            'githubStars' => (int) $repository['stargazers_count'],
        ];
    }

    /** @return array{value: string, suffix: string|null, label: string} */
    protected static function card(int $value, string $label): array
    {
        if ($value >= 1000) {
            return [
                'value' => (string) round($value / 1000),
                'suffix' => 'k',
                'label' => $label,
            ];
        }

        return [
            'value' => number_format($value),
            'suffix' => null,
            'label' => $label,
        ];
    }
}
