<?php

use Illuminate\Support\Facades\Route;
use YuriZoom\MoonShineScheduling\Controllers\SchedulingController;

Route::group([
    'prefix' => config('moonshine.route.prefix'),
    'as' => 'moonshine.',
    'middleware' => [config('moonshine.auth.middleware'), 'web'],
], function () {
    Route::post('scheduling/run', [SchedulingController::class, 'runEvent'])->name('scheduling.run');
});
