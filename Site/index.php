<?php
require_once "db.php";

$pdo = connect();

// Получаем количество изображений
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM Pictures");
$count = $stmt->fetch()["total"];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info-subtle">
<div class="container mt-5">
    <h2 class="text-info">Главная страница</h2>
    <div class="container col-6 rounded p-3 mt-3 position-absolute top-50 start-50 translate-middle">
        <p  class="text-center">Всего загруженных изображений: <strong><?php echo $count; ?></strong></p>
        <div class="text-center">
            <a href="pages/upload.php" class="btn btn-success">Загрузить изображение</a>
            <a href="pages/registration_form.php" class="btn btn-primary">Регистрация</a>
        </div>
    </div>
</div>
</body>
</html>
