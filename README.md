Scheduling task manager for MoonShine 3
============================

Веб-интерфейс для управления планировщиком задач в MoonShine.

## Скриншот

![wx20170809-165644](https://raw.githubusercontent.com/yurizoom/moonshine-scheduling/main/blob/screenshot.jpg)

## Установка

```
$ composer require yurizoom/moonshine-scheduling
```

## Настройка

Если необходимо изменить настройки, добавьте в файле config/moonshine.php:

```php
[
    'scheduling' => [
        // Автоматическое добавление в меню
        'auto_menu' => true,
    ]
]
```

### Добавление в меню

Для того чтобы добавить меню в другое место, вставьте следующий код в app/MoonShine/Layouts/MoonShineLayout.php:
```php
use YuriZoom\MoonShineScheduling\Pages\SchedulingPage;

protected function menu(): array
    {
        return [
            ...
            
            MenuItem::make(
                __('Scheduling'),
                SchedulingPage::class,
            ),
        ];
    }
```

Лицензия
------------
[The MIT License (MIT)](LICENSE).
