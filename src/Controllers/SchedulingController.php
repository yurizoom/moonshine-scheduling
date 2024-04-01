<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling\Controllers;

use MoonShine\Http\Controllers\MoonShineController;
use MoonShine\MoonShineRequest;
use YuriZoom\MoonShineScheduling\Scheduling;

class SchedulingController extends MoonShineController
{
    public function runEvent(MoonShineRequest $request): array
    {
        $scheduling = new Scheduling();

        try {
            $output = $scheduling->runTask((int) $request->get('id'));

            return [
                'status' => true,
                'message' => __('moonshine-scheduling::scheduling.success'),
                'data' => $output,
            ];
        } catch (\Exception|\Throwable $e) {
            return [
                'status' => false,
                'message' => __('moonshine-scheduling::scheduling.failed'),
                'data' => $e->getMessage(),
            ];
        }
    }
}
