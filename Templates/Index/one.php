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
    <h1><?php echo $article->title; ?></h1>
    <hr>
    <p><?php echo $article->text; ?></p>
    <p>автор: <?php echo $article->author->name; ?></p>
    <a href="/">Все новости</a>
    <hr>
</body>
</html>