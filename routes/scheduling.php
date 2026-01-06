<?php

use Illuminate\Support\Facades\Route;
use YuriZoom\MoonShineScheduling\Controllers\SchedulingController;

$middleware = config('moonshine.auth.middleware');
$middleware = is_array($middleware) ? $middleware : [$middleware];

Route::group([
    'prefix' => config('moonshine.route.prefix'),
    'as' => 'moonshine.',
    'middleware' => [...$middleware, 'web'],
], function () {
    Route::post('scheduling/run', [SchedulingController::class, 'runEvent'])->name('scheduling.run');
});
