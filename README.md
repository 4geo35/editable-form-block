### Установка

Добавить в `tailwind.admin.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-form-block/src/resources/views/livewire/admin/**/*.blade.php",
    "./vendor/4geo35/editable-form-block/src/resources/views/admin/**/*.blade.php",

Добавить в `tailwind.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-form-block/src/resources/views/components/**/*.blade.php",
    "./vendor/4geo35/editable-form-block/src/resources/views/web/**/*.blade.php",

Запустить миграции для создания таблиц `php artisan migrate`

#### Views

Сокращение для представлений: `efb`

#### Config

Название файла: `editable-form-block`  
Название типа блока: `requestForm`
