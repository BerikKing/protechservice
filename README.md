# ProtechService.kz

Добро пожаловать в репозиторий сайта [protechservice.kz](https://protechservice.kz) — Профессиональный сервис лабораторного оборудования
Ремонт, обслуживание и пуско-наладка оборудования  

## 📌 О проекте

ProtechService — это адаптивный лендинг с формой заявки, предназначенный для презентации услуг и привлечения клиентов. Пользователь может отправить сообщение, указав имя, телефон и запрос — заявка отправляется на корпоративную почту через SMTP.

## ⚙️ Технологии

- HTML5 / CSS3
- JavaScript (валидация формы)
- PHP (backend-логика отправки формы)
- PHPMailer (отправка email через SMTP)

## 📬 Отправка заявки

Форма собирает:
- Имя
- Телефон
- Сообщение

После отправки данные уходят на email `protechsrvc@gmail.com` с помощью PHPMailer.

## 🛠 Настройка

1. Установить [PHPMailer](https://github.com/PHPMailer/PHPMailer)
2. В `send.php` указать:
   - SMTP хост (например, smtp.gmail.com)
   - Email и пароль приложения Google
3. Загрузить на сервер с поддержкой PHP

## 📞 Контакты

- 📧 Email: protechsrvc@gmail.com  
- 🌐 Сайт: [protechservice.kz](https://protechservice.kz)

---

© 2025 ProtechService — Все права защищены.
