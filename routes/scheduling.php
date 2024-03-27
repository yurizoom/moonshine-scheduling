<?php

use Illuminate\Support\Facades\Route;
use MoonShine\Scheduling\Controllers\SchedulingController;

Route::group([
    'prefix' => 'moonshine',
    'as' => 'moonshine.',
    //'middleware' => config('moonshine.auth.middleware'),
], function () {
    Route::get('scheduling', [SchedulingController::class, 'index'])->name('scheduling.index');
    Route::post('scheduling/run', [SchedulingController::class, 'runEvent'])->name('scheduling.run');
});
