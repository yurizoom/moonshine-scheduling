<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling\Components;

use Exception;
use MoonShine\UI\Components\MoonShineComponent;
use YuriZoom\MoonShineScheduling\Scheduling;

/**
 * @method static static make()
 */
final class SchedulingComponent extends MoonShineComponent
{
    protected string $view = 'moonshine-scheduling::table';

    /**
     * @throws Exception
     */
    protected function viewData(): array
    {
        return [
            'events' => (new Scheduling())->getTasks(),
        ];
    }
}
