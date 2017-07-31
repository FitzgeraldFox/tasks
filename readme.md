## Список задач на Laravel

Чтобы запустить проект, вам нужно выполнить след. команды:
1. php artisan migrate
2. php artisan db:seed - чтобы наполнить базу тестовыми данными

TasksController отвечает за работу с задачами.

Доступные методы:

GET|HEAD  | api/v1/task        - список из 1000 последних задач

GET|HEAD  | api/v1/task/{task} - информация о задаче с переданным id

GET|HEAD  | api/v1/task/create - создание новой задачи. (Необходимо передать все данные: title, author, status, date, description)

PUT|PATCH | api/v1/task/{task} - обновление существующей задачи

DELETE    | api/v1/task/{task} - удаление существующей задачи

GET|HEAD  | search             - поиск задач. (Надо передать параметр str - строка запроса)

PagesController отвечает за работу со страницами.

Поиск реализован с помощью трейта Searchable: https://github.com/nicolaslopezj/searchable

В клиентской части использовал для кэширования данных localStorage