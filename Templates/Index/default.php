<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная | PHP2</title>
</head>
<body>
<h1>Последние новости:</h1>
<hr>
<?php foreach ($news as $article): ?>
<h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->lead; ?></p>
    <p>автор: <?php echo $article->author->name; ?></p>
    <a href="/Index/One/?id=<?php echo $article->id; ?>">more</a>
<?php endforeach; ?>
<hr>
<footer>
    <a href="/Admin/">Админка</a>
</footer>
</body>
</html>