# Laravel API with Job Queue, Database, and Event Handling
This is a simple Laravel API demonstrating job queues, database operations, and event handling.

It is built on Laravel Framework 10.10 and designed for demonstration purposes.

## Setup Instructions
1️⃣ Clone the Repository & Install Dependencies

```
git clone https://github.com/Sazzad-Saju/laravel-problem-solving.git
cd laravel-quiz01
composer install
```
2️⃣ Update .env with database credentials
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz01_db
DB_USERNAME=root
DB_PASSWORD=
```

3️⃣ Generate App Key & Run Migrations
```
php artisan key:generate
php artisan migrate
```

4️⃣ Set Up and Start Queue
```
php artisan queue:table
php artisan migrate
php artisan queue:work
```

5️⃣ Start Laravel Development Server
```
php artisan serve
```

## Testing the API Endpoint
Endpoint:
```
POST /api/submit
```

Request Body (JSON):
```
{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "message": "This is a test message."
}
```

Expected Response (202 - Accepted):
```
{
  "message": "Submission is being processed."
}
```

## Run Unit Tests
To test validation, job dispatch, and event handling:
```
php artisan test
```