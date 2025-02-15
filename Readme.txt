db.php – Подключение к базе данных.
register.php – Обработчик регистрации.
registration_form.php – HTML-форма.

Заранее создать базу данных DZ_3 и пустую таблицу Users

CREATE DATABASE DZ_3
GO

CREATE TABLE Users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    login NVARCHAR(50) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    created_at DATETIME DEFAULT GETDATE()
);

USE DZ_3;
SELECT * FROM Users;

-----Запуск-------------------------

Запустить БД, сервер (nginx, php-cgi)
В cmd:
D:\nginx\bin\nginx>start nginx

D:\nginx\bin\php>php-cgi.exe -b 127.0.0.1:9123



http://localhost/php_dz3/registration_form.php