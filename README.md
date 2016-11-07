Ответы к комментариям к Д/З №5
--------------------------------------------------------
1. Пункт 1. При ошибке в запросе не бросаете исключение. Жаль.

Добавил выбрасывание DbException при возникновении ошибок в запросах к БД

(изначально ограничился проверкой только соединения к базе)

https://github.com/alexx-gsm/php2/blob/master/App/Db.php#L28


2. Пункт 2. Не ловите исключение во фронт-контроллере. Минус.

Перенес логику работы с исключениями (try - catch) из Route во front-Controller
https://github.com/alexx-gsm/php2/blob/master/index.php#L16


3. Пункт 3. Опять не нашел - где ловите?

https://github.com/alexx-gsm/php2/blob/master/index.php#L29


4. Пункт 4. https://github.com/alexx-gsm/php2/blob/master/App/Models/AbstractModel.php#L126
   и КАК тут может возникнуть исключение? не нашел в вашем коде...
   
   свойства модели protected + __set() + __get() + __isset()
   
https://github.com/alexx-gsm/php2/blob/master/App/Models/Article.php#L65

 
P.S. с контроллером (точнее с роутером) перемудрил ... исправил. 
   

Repository of my HomeWorks.
PHP2 Course.
http://pr-of-it.ru/

В качестве MultiException() использовал созданый пакет

alexx-gsm/multiexception
--------------------------------------------------------

https://github.com/alexx-gsm/multiexception.git


Использование шаблонизатора Twig для front
--------------------------------------------------------

Использование пакета SwiftMailer:
--------------------------------------------------------
отправка письма при возникновении исключения DbException.

/mails - папка с тестовыми письмами (OpenServer)
