git clone https://github.com/dickyjoelsaputra/booklending.git
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
php artisan db:seed
