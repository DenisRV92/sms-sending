1. composer install

2. npm install

3. npm run build

4. в .env добавить доступы для бд(mysql)

5. В .env файле изменить на QUEUE_CONNECTION=database

6. В .env файл добавить LOGIN=тут свой логин для api
                        PASSWORD=тут свой пароль для api

7. php artisan migrate --seed

8. php artisan serve
