<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling;

use Illuminate\Support\ServiceProvider;
use MoonShine\Menu\MenuItem;
use MoonShine\MoonShine;
use YuriZoom\MoonShineScheduling\Pages\SchedulingPage;

class SchedulingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'moonshine-scheduling');
        $this->loadRoutesFrom(__DIR__.'/../routes/scheduling.php');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'moonshine-scheduling');
        $this->mergeConfigFrom(__DIR__.'/../config/scheduling.php', 'moonshine.scheduling');

        moonshine()
            ->pages([
                new SchedulingPage(),
            ])
            ->when(
                config('moonshine.scheduling.auto_menu'),
                fn (MoonShine $moonshine) => $moonshine->
                vendorsMenu([
                    MenuItem::make(
                        static fn () => __('Task scheduling'),
                        new SchedulingPage(),
                    ),
                ])
            );
    }
}
