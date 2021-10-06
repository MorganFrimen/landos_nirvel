<?php
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$city = trim($_POST['city']);
$select = trim($_POST['select']);

// указываем адрес отправителя, можно указать адрес на домене Вашего сайта
$fromMail = 'webmaster@promo.nirvel.ru';
$fromName = 'promo.nirvel.ru Форма';

// Сюда введите Ваш email
$emailTo = 'web@igrobeauty.ru';
$subject = 'Заявка на сотрудничество ';
$subject = '=?utf-8?b?' . base64_encode($subject) . '?=';
$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
$headers .= "From: " . $fromName . " <" . $fromMail . "> \r\n";

// тело письма
$body = "Получено письмо с сайта promo.nirvel.ru \n Имя: $name\nТелефон: $phone \n E-mail: $email\nГород: $city $select";

// сообщение будет отправлено в случае, если поле с номером телефона не пустое
if (strlen($phone) > 0) {
    $mail = mail($emailTo, $subject, $body, $headers, '-f' . $fromMail);
}
header("Location: https://promo.nirvel.ru/");
exit();
