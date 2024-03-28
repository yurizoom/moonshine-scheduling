Scheduling task manager for MoonShine
============================

Веб-интерфейс для управления планировщиком задач в Laravel.

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

Лицензия
------------
[The MIT License (MIT)](LICENSE).
