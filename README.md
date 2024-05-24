# POS System​ 🍕🍔🍟🌭🍿🎊

## Prerequisites 🧨🧨

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or another supported database

## Installation 🧨🧨

### Steps

### 1. **Backend:**

Location `./backend/.env`

**Database connection**
- `DB_CONNECTION`: `"mysql"`.
- `DB_HOST`: `"127.0.0.1"`.
- `DB_PORT`: `"3306"`.
- `DB_DATABASE`: `"example_db"`.
- `DB_USERNAME`: `"root"`.
- `DB_PASSWORD`: `"pwd_example"`.

**Mail connection**
- `MAIL_MAILER`: `"smtp"`.
- `MAIL_HOST`: `"smtp.gmail.com"`.
- `MAIL_PORT`: `"587"`.
- `MAIL_USERNAME`: `"admin@example.com"`.
- `MAIL_PASSWORD`: `"secret key"`.
- `MAIL_ENCRYPTION`: `"tls"`.
- `MAIL_FROM_ADDRESS`: `"admin@example.com"`.​
- `MAIL_FROM_NAME`: `"Restaurant Admin"`.​
- `VUE_APP_BASE_URL`: `"http://localhost:8080/"`.​

**OneSignal connection (Optional)**

Read documentation: [https://documentation.onesignal.com/docs/web-push-quickstart]
- `ONE_SIGNAL_APP_ID`: `"key"`.​
- `ONE_SIGNAL_AUTHORIZE`: `"key"`.​

**Follow commands**
- `Install dependencies`: `composer install`.
- `Generate key`: `php artisan key:generate`.
- `Migrations`: `php artisan migrate`.
- `Seeders`: `php artisan db:seed`.
- `Start`: `php artisan serve`.

### 2. **Frontend:**

**Res APIs connection**

Location `./frontend/.env.development` | `./frontend/.env.production`
- `VUE_APP_API_URL`: `"http://127.0.0.1:8000/api/"`.
- `VUE_APP_SOCKET_URL`: `"http://127.0.0.1:8000"`.

**Firebase connection**

Location `./frontend/firebase.js`

Watch video: [https://www.youtube.com/watch?v=TAjlNU7dVXE]
- `apiKey`: `"key"`.
- `authDomain`: `"key"`.
- `projectId`: `"key"`.
- `storageBucket`: `"key"`.
- `messagingSenderId`: `"key"`.
- `appId`: `"key"`.
- `measurementId`: `"key"`.

**OneSignal connection (Optional)**

Location `./frontend/onesignal.js`
- `appId`: `"key (Use the same as env key ONE_SIGNAL_APP_ID in backend)"`.

**Follow commands**
- `Install dependencies`: `npm install`.
- `Start`: `npm run serve`.

## ✨🎉🎉 Great! Let's go to use POS System! 🎉🎉✨

**Follow users**
- `Restaurant Owner`: `restaurant_owner@example.com` | `Password`: `123`.
- `Waiter`: `waiter@example.com` | `Password`: `123`.
- `Chef`: `chef@example.com` | `Password`: `123`.
- `Cashier`: `cashier@example.com` | `Password`: `123`.
