<?php

namespace App\Providers;

use Hyde;
use Hyde\Support\Models\Redirect;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->addRedirect(new Redirect('blog', 'posts'));
    }

    protected function addRedirect(Redirect $redirect): void
    {
        Hyde::pages()->addPage($redirect);
        Hyde::routes()->addRoute($redirect->getRoute());
    }
}
