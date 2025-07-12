Laravel Real-Time Chat Application

This is a real-time chat application built with Laravel, using Pusher for WebSocket-based messaging.
A Laravel application to manage customer data with full CRUD operations, follow-up scheduling, and secure OAuth-based social login (Google/Facebook).

Laravel Project Setup

1 Clone the Project
git clone https://github.com/kulwinder5033/laravel-chat-application.git
cd laravel-chat-application

2. Install Laravel Dependencies
composer install
npm install && npm run dev

3. Configure .env File
cp .env.example .env
php artisan key:generate

Update your .env file with the following:

DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@email.com
MAIL_FROM_NAME="Your App Name"

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=xxxx
PUSHER_APP_KEY=xxxx
PUSHER_APP_SECRET=xxxx

GOOGLE_CLIENT_ID=xxxxxxxxxx.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=xxxxxxx
GOOGLE_REDIRECT_URI=xxx

4 Run Migrations
php artisan migrate
php artisan db:seed

5.  Run the server
        php artisan serve
    Run the queue work
        php artisan queue:work
    Run the Cron Job
        php artisan schedule:run

User Login details
1. email : user1@gmail.com , password : password
2. email : user2@gmail.com , password : password

