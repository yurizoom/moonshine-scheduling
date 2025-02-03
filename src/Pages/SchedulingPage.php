<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling\Pages;

use MoonShine\Laravel\Pages\Page;
use YuriZoom\MoonShineScheduling\Components\SchedulingComponent;

class SchedulingPage extends Page
{
    public function getTitle(): string
    {
        return __('Task scheduling');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function components(): array
    {
        return [
            SchedulingComponent::make(),
        ];
    }
}
