<?php
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$city = trim($_POST['city']);
$mesages = trim($_POST['mesages']);

// указываем адрес отправителя, можно указать адрес на домене Вашего сайта
$fromMail = 'webmaster@promo.nirvel.ru';
$fromName = 'promo.nirvel.ru Форма';

// Сюда введите Ваш email
$emailTo = 'eliseeva@igrobeauty.ru';
$subject = 'Вопрос Клиента';
$subject = '=?utf-8?b?' . base64_encode($subject) . '?=';
$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
$headers .= "From: " . $fromName . " <" . $fromMail . "> \r\n";

// тело письма
$body = "Получено письмо с сайта promo.nirvel.ru \n Имя: $name\nТелефон: $phone \n E-mail: $email\nГород: $city\n Вопрос: $mesages";

// сообщение будет отправлено в случае, если поле с номером телефона не пустое
if (strlen($phone) > 0) {
    $mail = mail($emailTo, $subject, $body, $headers, '-f' . $fromMail);
}
header("Location: https://promo.nirvel.ru/");
exit();
