## Installation

Copy and paste ```.env.example``` file to the same directory
Rename the file with ```.env```

Install vendor package

```bash
composer install
```

Create app secret

```bash
php artisan key:generate
```

Prepare database configuration
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name_for_this_app
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_username
```

Run migration

```bash
php artisan migrate
```

Run database seeder

```bash
php artisan db:seed
```

Install Node Modules

```bash
npm install
```

Mixin script and styles

```bash
npm run dev
```

## Loggin In
Use this credential
```dotenv
email: admin@bridgenote.com
password: admin123
```

