Scheduling task manager for MoonShine
============================

!!! В РАЗРАБОТКЕ !!!

Веб-интерфейс для управления планировщиком задач в Laravel.

## Скриншот

## Установка

```
$ composer require yurizoom/moonshine-scheduling
```

## Настройка

### Путь до директории с логами

Для изменения пути до директории с логами добавьте в файл config/moonshine.php:
```php
return [
    ...
    
    'log_viewer' => [
        'path' => storage_path('logs'),
    ],
    
    ...
]  
```

Лицензия
------------
[The MIT License (MIT)](LICENSE).
