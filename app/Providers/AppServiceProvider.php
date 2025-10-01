<?php

namespace App\Providers;

use Hyde;
use Hyde\Framework\Features\Navigation\NavigationData;
use Hyde\Support\Models\Redirect;
use Illuminate\Support\ServiceProvider;
use App\Extend\MultiVersionDocsExtension;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Hyde::registerExtension(MultiVersionDocsExtension::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->addRedirect(tap(new Redirect('blog', 'posts', false), function (Redirect $redirect): void {
            $redirect->navigation = new NavigationData('', 0, true);
        }));
    }

    protected function addRedirect(Redirect $redirect): void
    {
        Hyde::pages()->addPage($redirect);
        Hyde::routes()->addRoute($redirect->getRoute());
    }
}
