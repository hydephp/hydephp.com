<?php

namespace App\Extend;

use Hyde\Framework\Features\Navigation\NavigationMenuGenerator;
use Hyde\Framework\Features\Navigation\DocumentationSidebar;
use Hyde\Framework\Features\Navigation\MainNavigationMenu;
use Hyde\Support\Models\Route;

class VersionAwareNavigationMenuGenerator extends NavigationMenuGenerator
{
    protected string $pageClass;

    public static function newHandle(string $menuType, string $pageClass): MainNavigationMenu|DocumentationSidebar
    {
        $menu = new static($menuType);

        $menu->setPageClass($pageClass);

        $menu->generate();

        return new $menuType($menu->items);
    }

    protected function setPageClass(string $pageClass): void
    {
        $this->pageClass = $pageClass;
    }

    protected function canAddRoute(Route $route): bool
    {
        return parent::canAddRoute($route) && $route->getPage()::class === $this->pageClass;
    }
}