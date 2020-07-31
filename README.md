# myproject

This project is about website for conference making by Laravel 5.8.29

## Getting Started

### Installation / Reinstall some plugins
```
composer install
```
### Seting .env
if you use linux / mac
```
cp .env.example .env
```
or if you use window
```
copy .env.example .env
```
setting your database in .env file .. then, generate key 
```
php artisan key:generate
```

## Database Part

### Migrate Database Schema
```
php artisan migrate
```

## Permission

### File Permission (Linux / Mac only)
```
sudo chmod 775 -R myproject
sudo chmod 777 -R myproject/storage
```