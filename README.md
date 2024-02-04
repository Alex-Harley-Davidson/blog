<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px" alt="logo">
    </a>
    <h1 align="center">Blog</h1>
    <br>
</p>

Инструкция по установке:
------------------------

Установка пакетов при помощи композера:

```
docker-compose run --rm backend composer install
```

Инициализация приложения:

```
docker-compose run --rm backend php init
```

В файле `common\config\main-local.php` настроить подключение к базе данных:

```
'dsn' => 'mysql:host=mysql;dbname=blog_db',
'username' => 'blog_user',
'password' => '12345',
```

Запустить приложение:

```
docker-compose up -d
```

Применить миграции:

```
docker-compose run --rm backend php yii migrate
```

Функционал API:
---------------

RestApi для блока:

`GET http://localhost:20080/blog` Получение списка записей<br>

`GET http://localhost:20080/blog/2` Получение записи с `id` = 2<br>

`POST http://localhost:20080/blog` Добавление записи<br>

Параметры передаются в теле запроса<br>
`PUT, PATCH http://localhost:20080/blog/2` Изменение записи с `id` = 2<br>

Параметры передаются в теле запроса<br>
`DELETE http://localhost:20080/blog/2` Удаление записи с `id` = 2<br>


Сортировка записей по дате в обратном порядке: сначала более свежие записи (по-умолчанию)<br>
Сортировка записей по дате с указанием параметра, сначала более старые записи:<br>
`GET http://localhost:20080/blog?sort=date`<br>


Постраничная разбивка по 10 записей<br>