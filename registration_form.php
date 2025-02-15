<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body class="bg-info-subtle">
    <div>
        <div class="row">
            <div class="row m-3">
                <h2 class="text-info">Форма регистрации</h2>
            </div>
            <form method="POST" action="register.php" class="container col-6 rounded p-3 mt-3 position-absolute top-50 start-50 translate-middle shadow-lg">
            <!-- <form method="POST" action="register.php" class="container col-6 rounded p-3 mt-3 shadow-lg"> -->
                <div class="row mt-3">
                    <div class="col-3"><label class="form-label" for="login">Логин:</label></div>
                    <div class="col-9"><input id="login" class="form-control border border-primary focus-ring focus-ring-primary" type="text" name="login" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-3"><label class="form-label" for="password">Пароль:</label></div>
                    <div class="col-9"><input id="password" class="form-control border border-primary focus-ring focus-ring-primary" type="password" name="password" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-3"><label class="form-label" for="email">Email:</label></div>
                    <div class="col-9"><input id="email" class="form-control border border-primary focus-ring focus-ring-primary" type="email" name="email" required></div>
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
