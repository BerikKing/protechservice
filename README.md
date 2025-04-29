# ProtechService.kz

Добро пожаловать в репозиторий сайта [protechservice.kz](https://protechservice.kz) — сервисного центра по ремонту и обслуживанию протезно-ортопедических изделий.

## 📌 О проекте

ProtechService — это адаптивный лендинг с формой заявки, предназначенный для презентации услуг и привлечения клиентов. Пользователь может отправить сообщение, указав имя, телефон и запрос — заявка отправляется на корпоративную почту через SMTP.

## ⚙️ Технологии

- HTML5 / CSS3
- JavaScript (валидация формы)
- PHP (backend-логика отправки формы)
- PHPMailer (отправка email через SMTP)
- Google reCAPTCHA (по желанию)

## 📬 Отправка заявки

Форма собирает:
- Имя
- Телефон
- Сообщение

После отправки данные уходят на email `protechsrvc@gmail.com` с помощью PHPMailer.

## 📁 Структура проекта

├── index.html  
├── style.css  
├── send.php  
├── PHPMailer/  
│   ├── PHPMailer.php  
│   ├── SMTP.php  
│   └── Exception.php  
└── README.md

## 🛠 Настройка

1. Установить [PHPMailer](https://github.com/PHPMailer/PHPMailer)
2. В `send.php` указать:
   - SMTP хост (например, smtp.gmail.com)
   - Email и пароль приложения Google
3. Загрузить на сервер с поддержкой PHP

## 🔐 Безопасность

- Используется HTML-экранирование для защиты от XSS
- Пароль приложения хранится напрямую (рекомендуется использовать `.env`)
- Желательно добавить защиту от спама (reCAPTCHA)

## 📞 Контакты

- 📧 Email: protechsrvc@gmail.com  
- 🌐 Сайт: [protechservice.kz](https://protechservice.kz)

---

© 2025 ProtechService — Все права защищены.
