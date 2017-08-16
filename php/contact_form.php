<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["cd-name"]);
$email = htmlspecialchars($_POST["cd-email"]);
$message = htmlspecialchars($_POST["cd-textarea"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
$company = htmlspecialchars($_POST["cd-company"]);
$radio1 = htmlspecialchars($_POST["cd-radio-1"]);
$radio2 = htmlspecialchars($_POST["cd-radio-2"]);
$radio3 = htmlspecialchars($_POST["cd-radio-3"]);

/* Ваш адрес и тема сообщения */
$address = "filincorporation.support@yandex.ru";
$sub = "Сообщение от посетителя";

/* Формат письма */
$mes = "Сообщение от посетителя.\n
Имя отправителя: $name
Электронный адрес отправителя: $email
Компания отправителя:$company
Текст сообщения:
$message";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from = "Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 5; URL=/');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на страницу Контакты</body>';}
else {
	header('Refresh: 5; URL=http://b.ru');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на страницу Контакты</body>';}
}
exit;  /*Выход без сообщения, если поле bezspama чем-то заполнено*/

?>
