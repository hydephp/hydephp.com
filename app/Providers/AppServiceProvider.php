<?php

namespace App\Providers;

use Hyde;
use Hyde\Foundation\HydeKernel;
use Hyde\Framework\Features\Navigation\NavigationData;
use Hyde\Support\Models\Redirect;
use Illuminate\Support\ServiceProvider;
use App\Extend\MultiVersionDocsExtension;
use App\Pages\v1DocumentationSearchIndex;
use App\Pages\v2DocumentationSearchIndex;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Hyde::registerExtension(MultiVersionDocsExtension::class);
        Hyde::booting(function (HydeKernel $kernel): void {
            $kernel->pages()->addPage(new v1DocumentationSearchIndex());
            $kernel->pages()->addPage(new v2DocumentationSearchIndex());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->addRedirect(tap(new Redirect('blog', 'posts', false), function (Redirect $redirect): void {
            $redirect->navigation = new NavigationData('', 0, true);
        }));

        Hyde::routes()->forget('docs/2.x/search.json');
        Hyde::routes()->addRoute((new v2DocumentationSearchIndex())->getRoute());
    }

    protected function addRedirect(Redirect $redirect): void
    {
        Hyde::pages()->addPage($redirect);
        Hyde::routes()->addRoute($redirect->getRoute());
    }
}
