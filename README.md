
## Simple Authorization Admin Panel With Roles And Permissions

There is an application which implements authorization with roles and permissions.
It is simple example of using together such tools as laravel sanctum, spatie-laravel-permission, vue-casl etc . 


## Installation

### Install Laravel API

1. Download the project (or clone using GIT)
2. Copy .env.example into .env and configure database credentials
3. Navigate to the project's root directory using terminal
4. Run composer install
5. Set the encryption key by executing php artisan key:generate --ansi
6. Run migrations php artisan migrate --seed
6. Start local server by executing php artisan serve
7. Open new terminal and navigate to the project root directory

### Install Vuejs Admin Panel

1. Navigate to frontend folder
2. Run npm install
3. Copy backend/.env.example into backend/.env
4. Make sure VITE_API_BASE_URL key in backend/.env is set to your Laravel API host (Default: http://localhost:8000)
5. Run npm run dev
6. Open Vue.js Admin Panel in browser and login with

Login as 'superuser' and test your own roles and permissions combinations.

```
    superuser@example.com
    123qwe123
    ```
