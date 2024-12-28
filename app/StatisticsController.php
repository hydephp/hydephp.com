<?php

namespace App;

use Illuminate\Support\Facades\Http;

/**
 * @internal If anyone sees this source code, I'm sorry. Just something I bodged together.
 */
class StatisticsController
{
    /** @var object{packagistInstalls: string, githubViews: string, githubClones: string, githubViewsWeekly: string, githubClonesWeekly: string} */
    public object $stats;

    public int $linesOfCode;

    public function __construct()
    {
        $this->stats = $this->getStats();

        $this->linesOfCode = $this->getLinesOfCode();
    }

    protected function getStats()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://analytics.hydephp.com/api/stats');

        return $response->object();
    }

    protected function getLinesOfCode()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://analytics.hydephp.com/api/stats/lines_of_code');

        return $response->json('data.total');
    }
}
