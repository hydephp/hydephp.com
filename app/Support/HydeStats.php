<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HydeStats
{
    public static function fetch(): array
    {
        // Cache for 3 hours; let exceptions bubble so the build fails on errors.
        return Cache::remember('hyde.stats.v1', now()->addHours(3), function () {
            $analytics = Http::timeout(10)
                ->acceptJson()
                ->withHeaders(['User-Agent' => 'HydePHP-Website'])
                ->get('https://analytics.hydephp.com/api/stats')
                ->throw()
                ->json('data', []);

            $github = Http::timeout(10)
                ->acceptJson()
                ->withHeaders(self::githubHeaders())
                ->get('https://api.github.com/repos/hydephp/hyde')
                ->throw()
                ->json();

            return [
                // Analytics API
                'packagist_installs'   => $analytics['packagistInstalls'] ?? null,
                'github_views'         => $analytics['githubViews'] ?? null,
                'github_clones'        => $analytics['githubClones'] ?? null,

                // GitHub repo API
                'stars'       => $github['stargazers_count'] ?? null,
                'forks'       => $github['forks_count'] ?? null,
                'watchers'    => $github['subscribers_count'] ?? null,
                'open_issues' => $github['open_issues_count'] ?? null,

                'fetched_at'  => now()->toIso8601String(),
            ];
        });
    }

    public static function short(int|float|null $n): string
    {
        if ($n === null) return '—';
        if ($n >= 1_000_000) return number_format($n / 1_000_000, 1) . 'M';
        if ($n >= 1_000)     return number_format($n / 1_000, 1) . 'k';
        return number_format((int)$n);
    }

    protected static function githubHeaders(): array
    {
        $headers = ['User-Agent' => 'HydePHP-Website', 'Accept' => 'application/vnd.github+json'];
        $token = config('services.github.token', env('GITHUB_TOKEN'));
        if ($token) {
            $headers['Authorization'] = 'Bearer ' . $token;
        }
        return $headers;
    }
}
