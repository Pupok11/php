<?php
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT username, email, created_at FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 350px; }
        h1 { text-align: center; margin: 0 0 20px; }
        p { margin: 10px 0; }
        .logout { display: block; text-align: center; margin-top: 20px; padding: 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
<div class="box">
    <h1>Личный кабинет</h1>
    <p>Привет, <strong><?= htmlspecialchars($user['username']) ?></strong>!</p>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <p>Дата регистрации: <?= htmlspecialchars($user['created_at']) ?></p>
    <a href="logout.php" class="logout">Выйти</a>
</div>
</body>
</html>