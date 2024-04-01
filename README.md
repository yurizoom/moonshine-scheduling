Scheduling task manager for MoonShine
============================

Веб-интерфейс для управления планировщиком задач в MoonShine.

## Скриншот

![wx20170809-165644](https://raw.githubusercontent.com/yurizoom/moonshine-scheduling/main/blob/screenshot.jpg)

## Установка

```
$ composer require yurizoom/moonshine-scheduling
```

## Настройка

В файле config/moonshine.php добавьте конфигурации.

```php
[
    'scheduling' => [
        // Автоматическое добавление в меню
        'auto_menu' => true,
    ]
]
```

### Добавление в меню

Для того чтобы добавить меню в другое место, вставьте следующий код в app/Providers/MoonShineServiceProvider.php:
```php
use YuriZoom\MoonShineScheduling\Pages\SchedulingPage;

protected function menu(): array
    {
        return [
            ...
            
            MenuItem::make(
                static fn () => __('Scheduling'),
                new SchedulingPage(),
            ),
            
            ...
        ];
    }
```

Лицензия
------------
[The MIT License (MIT)](LICENSE).
