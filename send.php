<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

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
        $mail->Username = 'no-reply@protechservice.kz'; // ваш email на ps.kz
        $mail->Password = '92Up#60pm';  // ваш пароль от почты
        $mail->SMTPSecure = 'ssl'; // Используйте 'tls' если у вас 587 порт
        $mail->SMTPAutoTLS = false; // Отключаем автоматическое шифрование
        $mail->SMTPDebug = 0; // 0 - отключить отладку, 1 - включить отладку
        $mail->Debugoutput = 'html'; // Вывод отладки в HTML формате
        $mail->CharSet = 'UTF-8'; // Кодировка
        $mail->setLanguage('ru', 'PHPMailer/language/'); // Устанавливаем язык для ошибок
        $mail->isHTML(true); // Устанавливаем формат письма в HTML
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Port = 465; // Порт для SSL

        $mail->setFrom('no-reply@protechservice.kz', 'protechservice.kz Support');
        $mail->addReplyTo('protechsrvc@gmail.com', 'ProtechService');
        $mail->addAddress('protechsrvc@gmail.com'); // куда отправлять
        $mail->isHTML(true);
        $mail->Subject = 'New messege from site protethservice.kz';
        $mail->Body = '
            <div style="font-family: Arial, sans-serif; background: #f3f4f6; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto; color: #333; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);">
                <div style="background: linear-gradient(to right, #5e6263,rgb(56, 58, 58)); padding: 20px; border-radius: 10px 10px 0 0; text-align: center; color: white;">
                    <h1 style="margin: 0; font-size: 24px;">✨ Новая заявка с сайта ✨</h1>
                </div>
                <div style="background: white; border-radius: 0 0 10px 10px; padding: 20px;">
                    <h2 style="color: #333; text-align: center; font-size: 20px; margin-bottom: 15px;">Детали заявки</h2>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <tr style="background: #f9f9f9; color: #333; font-size: 16px;">
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e0e0e0;">📋 Поле</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e0e0e0;">🔍 Значение</th>
                        </tr>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #5e6263; font-size: 19px;">Имя:</td>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #555; font-size: 19px;">' . htmlspecialchars($_POST['name']) . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #5e6263; font-size: 19px;">Телефон:</td>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #555; font-size: 19px;">' . htmlspecialchars($_POST['phone']) . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #5e6263; font-size: 19px;">Сообщение:</td>
                            <td style="padding: 15px; border-bottom: 1px solid #f0f0f0; color: #555; font-size: 19px;">' . htmlspecialchars($_POST['message']) . '</td>
                        </tr>
                    </table>
                    <div style="text-align: center; padding: 10px; background: #f3f4f6; border-radius: 5px; color: #777;">
                        <p style="margin: 5px 0; font-size: 14px;"> Время пошло ⏳! Клиент ждет вашего звонка, успейте до финального гудка!.</p>
                        <p style="margin: 0; font-size: 12px;">⚠️ Это письмо было сгенерировано автоматически.</p>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="https://protechservice.kz" style="text-decoration: none; background: #5e6263; color: white; padding: 10px 20px; border-radius: 5px; font-size: 14px;">Посетить сайт</a>
                </div>
            </div>
        ';
        $mail->send();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Ошибка при отправке: ' . $mail->ErrorInfo]);
    }
}
