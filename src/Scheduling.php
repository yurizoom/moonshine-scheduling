<?php

declare(strict_types=1);

namespace YuriZoom\MoonShineScheduling;

use Illuminate\Console\Scheduling\CallbackEvent;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;
use Throwable;

class Scheduling
{
    /**
     * @var string out put file for command.
     */
    protected string $sendOutputTo;

    /**
     * Get all events in console kernel.
     *
     * @throws BindingResolutionException
     */
    protected function getKernelEvents(): array
    {
        app()->make(ConsoleKernelContract::class)->all();

        return app(Schedule::class)->events();
    }

    /**
     * Get all formatted tasks.
     *
     * @throws \Exception
     */
    public function getTasks(): array
    {
        $tasks = [];

        foreach ($this->getKernelEvents() as $event) {
            $tasks[] = [
                'task' => $this->formatTask($event),
                'expression' => $event->expression,
                'nextRunDate' => $event->nextRunDate()->format('Y-m-d H:i:s'),
                'description' => $event->description,
                'readable' => CronSchedule::fromCronString($event->expression)->asNaturalLanguage(),
            ];
        }

        return $tasks;
    }

    /**
     * Format a giving task.
     */
    protected function formatTask($event): array
    {
        if ($event instanceof CallbackEvent) {
            return [
                'type' => 'closure',
                'name' => 'Closure',
            ];
        }

        if (Str::contains($event->command, '\'artisan\'')) {
            $exploded = explode(' ', $event->command);

            return [
                'type' => 'artisan',
                'name' => 'artisan '.implode(' ', array_slice($exploded, 2)),
            ];
        }

        if (PHP_OS_FAMILY === 'Windows' && Str::contains($event->command, '"artisan"')) {
            $exploded = explode(' ', $event->command);

            return [
                'type' => 'artisan',
                'name' => 'artisan '.implode(' ', array_slice($exploded, 2)),
            ];
        }

        return [
            'type' => 'command',
            'name' => $event->command,
        ];
    }

    /**
     * Run specific task.
     *
     *
     * @throws Throwable
     */
    public function runTask(int $id): string
    {
        set_time_limit(0);

        /** @var Event $event */
        $event = $this->getKernelEvents()[$id - 1];

        if (PHP_OS_FAMILY === 'Windows') {
            $event->command = Str::of($event->command)->replace('php-cgi.exe', 'php.exe');
        }

        $event->sendOutputTo($this->getOutputTo());

        $event->run(app());

        return $this->readOutput();
    }

    protected function getOutputTo(): string
    {
        if (! isset($this->sendOutputTo)) {
            $this->sendOutputTo = storage_path('app/task-schedule.output');
        }

        return $this->sendOutputTo;
    }

    /**
     * Read output info from output file.
     */
    protected function readOutput(): string
    {
        return file_get_contents($this->getOutputTo());
    }
}
