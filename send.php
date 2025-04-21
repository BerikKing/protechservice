<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!$name || !$phone || !$message) {
        echo json_encode(['status' => 'error', 'message' => 'Все поля обязательны.']);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Настройки SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.protechservice.kz'; // SMTP сервер ps.kz
        $mail->SMTPAuth = true;
        $mail->Username = 'info@protechservice.kz'; // ваш email на ps.kz
        $mail->Password = 'Qq4q6FVBhd2Fvd5';  // ваш пароль от почты
        $mail->SMTPSecure = 'ssl'; // или 'tls'
        $mail->Port = 465;

        $mail->setFrom('info@protechservice.kz', 'Заявка с сайта');
        $mail->addAddress('berloo24@gmail.com'); // куда отправлять

        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body = "
            <h2>Новая заявка</h2>
            <p><strong>Имя:</strong> $name</p>
            <p><strong>Телефон:</strong> $phone</p>
            <p><strong>Сообщение:</strong><br>$message</p>
        ";

        $mail->send();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Ошибка при отправке: ' . $mail->ErrorInfo]);
    }
}
