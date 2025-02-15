<?php
$host = "DESKTOP-NKNKVEQ\\SQLEXPRESS";
$user = "";  // Windows-аутентификация
$password = "";
$dbname = "DZ_3";

function connect() {
    global $host, $user, $password, $dbname;

    try {
        $dsn = "sqlsrv:Server=$host;Database=$dbname;TrustServerCertificate=True";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
        ];
        
        if (empty($user) && empty($password)) {
            return new PDO($dsn, null, null, $options); // Windows-аутентификация
        } else {
            return new PDO($dsn, $user, $password, $options);
        }
    } catch (PDOException $e) {
        die("Ошибка подключения: " . $e->getMessage());
    }
}

// Создание таблицы пользователей
function createUsersTable($pdo) {
    $sql = "CREATE TABLE Users (
        id INT IDENTITY(1,1) PRIMARY KEY,
        login NVARCHAR(50) UNIQUE NOT NULL,
        password NVARCHAR(255) NOT NULL,
        email NVARCHAR(100) UNIQUE NOT NULL,
        created_at DATETIME DEFAULT GETDATE()
    )";
    
    try {
        $pdo->exec($sql);
        echo "Таблица пользователей успешно создана.";
    } catch (PDOException $e) {
        echo "Ошибка создания таблицы: " . $e->getMessage();
    }
}
?>