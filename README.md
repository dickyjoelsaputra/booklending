git clone https://github.com/dickyjoelsaputra/booklending.git
<br>
cd booklending
<br>
composer install
<br>
cp .env.example .env
<br>
php artisan key:generate
<br>
php artisan migrate
<br>
php artisan serve
<br>
php artisan db:seed
