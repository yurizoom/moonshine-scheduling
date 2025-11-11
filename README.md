Scheduling task manager for MoonShine 4
============================

Веб-интерфейс для управления планировщиком задач в MoonShine.

### Поддержка версий MoonShine

| MoonShine | Пакет |
|-----------|-------|
| 2.0+      | 1.0+  |
| 3.0+      | 2.0+  |
| 4.0+      | 3.0+  |

## Скриншот

![screenshot](https://github.com/yurizoom/moonshine-scheduling/blob/main/blob/screenshot.jpg?raw=true)

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
            
            MenuItem::make(SchedulingPage::class),
        ];
    }
```

Лицензия
------------
[The MIT License (MIT)](LICENSE).
