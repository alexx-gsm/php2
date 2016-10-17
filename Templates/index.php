<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная | PHP2-1</title>
</head>
<body>
<h1>Последние новости:</h1>
<hr>
<?php foreach ($news as $article): ?>
<h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->lead; ?></p>
    <a href="/article.php?id=<?php echo $article->getId()?>">more</a>
<?php endforeach; ?>
<hr>
</body>
</html>