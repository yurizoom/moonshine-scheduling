<?php

namespace MoonShine\Scheduling\Controllers;

use MoonShine\Http\Controllers\MoonShineController;
use MoonShine\MoonShineRequest;
use MoonShine\Scheduling\Scheduling;

class SchedulingController extends MoonShineController
{
    public function index(MoonShineRequest $request)
    {
    }

    public function runEvent(MoonShineRequest $request): array
    {
        $scheduling = new Scheduling();

        try {
            $output = $scheduling->runTask($request->get('id'));

            return [
                'status'    => true,
                'message'   => 'success',
                'data'      => $output,
            ];
        } catch (\Exception|\Throwable $e) {
            return [
                'status'    => false,
                'message'   => 'failed',
                'data'      => $e->getMessage(),
            ];
        }
    }
}
