## Installation & usage

-   For Install you have to clone this repo or you can fire this command as well.

```php
git clone https://github.com/ZalaNihir/adminlte-laravel10.git
```

-   Go into folder

```php
cd adminlte-laravel10
```

-   After the installation you have to update the vendor folder you can update the vendor folder using this command.

```php
composer update
```

-   After the updation you have to create the `.env` file via this command.

```php
cp .env.example .env
```

-   Now you have to generate the product key.

```php
php artisan key:generate
```

-   Now migrate the tables & seed the database.

```php
php artisan migrate --seed
```

-   Install the required npm package.

```php
npm install
```

-   To build assets and create the manifest file.

```php
npm run build
```

-   We are done here. Now you have to just serve your project.

```php
php artisan serve
```

-   This is the updated code of admin.

To get the access of admin side there is credentials bellow

-   Admin

email: `admin@gmail.com`
password: `admin123`

-   User

email: `user@gmail.com`
password: `user123`

-   Vendor

email: `sis@gmail.com`
password: `sis123`

-   Get the orginal installaltion from the below gitHub address.

```php
git clone https://github.com/ZalaNihir/adminlte-laravel10.git
```
