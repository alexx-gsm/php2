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
<a href="/Admin/Edit/?new">Добавить новость</a>
<hr>
<table>
    <thead>
    <tr>
        <?php foreach ($tableHeader as $headerCell): ?>
            <th><?php echo $headerCell; ?></th>
        <?php endforeach; ?>
        <th width="20%">Инструменты</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($table as $row): ?>
    <tr>
        <?php foreach ($row as $cell): ?>
            <td><?php echo $cell; ?></td>
        <?php endforeach; ?>
        <td>
            <a href="/Admin/Edit/?id=<?php echo $row[0]; ?>">Edit</a>
            <a href="/Admin/Delete/?id=<?php echo $row[0]; ?>">Delete</a>
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