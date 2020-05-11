### Creating Migration Table
```
php artisan make:migration create_appointment_table
php artisan make:migration create_book_spots_table
php artisan make:migration create_messages_table

php artisan migrate
```

### Creating Controllers
```
php artisan make:controller AppointmentController
php artisan make:model Appointment
```

### Auth
```
composer require laravel/ui

php artisan ui vue --auth
```

```
composer require laravel/sanctum

php artisan make:controller AuthController
php artisan make:seeder UsersTableSeeder
php artisan db:seed
```

