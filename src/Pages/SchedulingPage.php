<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling\Pages;

use MoonShine\Attributes\Icon;
use MoonShine\Pages\Page;
use YuriZoom\MoonShineScheduling\Components\SchedulingComponent;

#[Icon('heroicons.outline.clock')]
class SchedulingPage extends Page
{
    public function title(): string
    {
        return __('Composer Viewer');
    }

    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title(),
        ];
    }

    public function components(): array
    {
        return [
            SchedulingComponent::make(),
        ];
    }
}
