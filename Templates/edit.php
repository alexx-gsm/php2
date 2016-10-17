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
<?php if ($article->isNew()): ?>
<h1>Новая новость</h1>
<?php else: ?>
<h1>Редактируем новость</h1>
<?php endif; ?>
<hr>
<fieldset>
    <legend>
        Новость
    </legend>
    <form action="/save.php" method="get">
        <table>
            <tbody>
            <tr>
                <td><label for="title">Заголовок:</label></td>
                <td><input type="text" id="title" name="article[title]" value="<?php echo $article->title; ?>"></td>
            </tr>
            <tr>
                <td><label for="lead">Пре-текст:</label></td>
                <td><textarea id="lead" name="article[lead]"><?php echo $article->lead; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="text">Текст:</label></td>
                <td><textarea id="text" name="article[text]"><?php echo $article->text; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Сохранить"></td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="article[id]" value="<?php echo $article->getId(); ?>">
    </form>
</fieldset>
</body>
</html>