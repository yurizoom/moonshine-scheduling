<?php

declare(strict_types=1);

namespace MoonShine\Scheduling\Components;

use Exception;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Scheduling\Scheduling;

/**
 * @method static static make()
 */
final class SchedulingComponent extends MoonShineComponent
{
    protected string $view = 'moonshine-scheduling::scheduling';

    public function __construct()
    {
        //
    }

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
