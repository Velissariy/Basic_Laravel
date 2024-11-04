<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
<h1>Профиль пользователя: {{ $user->first_name }} {{ $user->last_name }}</h1>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Дата создания:</strong> {{ $user->created_at->format('d.m.Y') }}</p>
</body>
</html>
