<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Contracts\MenuManager\MenuManagerContract;
use MoonShine\MenuManager\MenuItem;
use YuriZoom\MoonShineScheduling\Pages\SchedulingPage;

class SchedulingServiceProvider extends ServiceProvider
{
    public function boot(CoreContract $core, MenuManagerContract $menu): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'moonshine-scheduling');
        $this->loadRoutesFrom(__DIR__.'/../routes/scheduling.php');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'moonshine-scheduling');
        $this->mergeConfigFrom(__DIR__.'/../config/scheduling.php', 'moonshine.scheduling');

        $core
            ->pages([
                SchedulingPage::class,
            ]);

        if (config('moonshine.scheduling.auto_menu')) {
            $menu->add([
                MenuItem::make(
                    __('Task scheduling'),
                    SchedulingPage::class,
                ),
            ]);
        }
    }
}
