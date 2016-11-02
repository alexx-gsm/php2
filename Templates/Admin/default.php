<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка | PHP2</title>
</head>
<body>
<h1>Все новости:</h1>
<hr>
<a href="/Admin/Edit/">Добавить новость</a>
<hr>
<table>
    <thead>
    <tr>
        <th width="10%">id</th>
        <th>Заголовок</th>
        <th width="20%">Автор</th>
        <th width="20%">Инструменты</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $article): ?>
    <tr>
        <td><?php echo $article->id; ?></td>
        <td><?php echo $article->title; ?></td>
        <td><?php echo $article->author->name; ?></td>
        <td>
            <a href="/Admin/Edit/?id=<?php echo $article->id; ?>">Edit</a>
            <a href="/Admin/Delete/?id=<?php echo $article->id; ?>">Delete</a>
        </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
<hr>
<footer>
    <a href="/">Перейти на сайт</a>
</footer>
</body>
</html>