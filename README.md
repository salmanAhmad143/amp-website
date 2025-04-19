# Laravel Admin Panel

A laravel admin panel with all the basic feature that are required to start developement of any project in laravel.

## Highlight of the feature:

-   Role based authentication
-   Create role and assign permission to it.
-   Assign role to user and user can access only assigned modules.
-   User management add, edit and delete option
-   Admin panel setting option to change basic setting like - logo, theme color etc.
-   Category management crud operation
-   Activity log to check real time user activities.

## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

## Installation

Clone the repository or download as zip in your system.

```bash
  Go to the folder and run command -

  composer install
  php artisan key:generate
  php artisan storage:link
  php artisan migrate
  php artisan db:seed

  php artisan cache:clear
  php artisan config:clear
  php artisan view:clear
  php artisan config:cache
  php artisan view:cache
  php artisan route:cache
  composer dump-autoload
  php artisan vendor:publish
```
