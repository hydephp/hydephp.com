<?php

namespace App;

use Illuminate\Support\Facades\Http;

/**
 * @internal If anyone sees this source code, I'm sorry. Just something I bodged together.
 */
class StatisticsController
{
    public object $framework;

    public object $linesOfCode;

    public function __construct()
    {
        $this->framework = $this->getFrameworkStats();
        unset($this->framework->versions);

        $this->linesOfCode = $this->getLinesOfCode();
    }

    protected function getFrameworkStats()
    {
        // Mock
        // $frameworkStats = '{"downloads":{"total":2497,"monthly":2290,"daily":76},"versions":["dev-master","v0.23.2-beta","v0.23.1-beta","v0.23.0-beta","v0.22.0-beta","v0.21.6-beta","v0.21.5-beta","v0.21.4-beta","v0.21.3-beta","v0.21.2-beta","v0.21.1-beta","v0.21.0-beta","v0.20.0-beta","v0.19.0-beta","v0.18.0-beta","v0.17.0-beta","v0.16.1-beta","v0.16.0-beta","v0.15.0-beta","v0.14.0-beta","v0.13.0-beta","v0.12.0-beta","v0.11.0-beta","v0.10.0-beta","v0.9.0-beta","v0.8.1-beta","v0.8.0-beta","v0.7.5-alpha","v0.7.4-alpha","v0.7.3-alpha","v0.7.2-alpha","v0.7.1-alpha","v0.7.0-alpha","v0.6.2-alpha","v0.6.1-alpha","v0.6.0-alpha","v0.5.3-alpha","v0.5.2-alpha","v0.5.1-alpha","v0.5.0-alpha","v0.4.3-alpha","v0.4.2-alpha","v0.4.1-alpha","v0.4.0-alpha","v0.3.1-alpha","v0.3.0-alpha","dev-update-changelog","dev-refactor-documentation-sidebar-internals","dev-analysis-KZEPOj","dev-analysis-BMOd0g","dev-analysis-OMWvDR","dev-refactor-docs-layout","dev-refactor-script-interactions","dev-analysis-vQEZPr","dev-analysis-L3GZVm","dev-280-feature-hide-the-hyde-install-command-once-it-has-been-run"],"average":"daily","date":"2022-03-21"}';
        // $frameworkStats = json_decode($frameworkStats);

        // return $frameworkStats;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://packagist.org/packages/hyde/framework/stats.json');

        return $response->object();
    }
    
    protected function getLinesOfCode()
    {
        // Mock
        // $object = new \stdClass();
        // $object->framework =  intval(str_replace('K', '', '11k')) * 1000;
        // $object->hyde =  intval(str_replace('K', '', '9k')) * 1000;
        // $object->total = $object->framework + $object->hyde;
        // return $object;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://img.shields.io/tokei/lines/github/hydephp/framework.json');

        $object = new \stdClass();
        $object->framework =  intval(str_replace('K', '', $response->object()->value)) * 1000;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'HydeDocsCI/dev-master (Twitter contact: @CodeWithCaen)',
        ])->get('https://img.shields.io/tokei/lines/github/hydephp/hyde.json');
        $object->hyde =  intval(str_replace('K', '', $response->object()->value)) * 1000;

        $object->total = $object->framework + $object->hyde;

        return $object;
    }
}
