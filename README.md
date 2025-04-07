Standaard admin email:admin@example.com
Standaard user password:admin
Standaard user email:user@example.com
Standaard user password:user

Run composer install && npm install to install the required packages. Next run cp .env.example .env && php artisan key:generate.
To migrate and seed the database, run php artisan migrate:fresh --seed.

Then npm run build && composer run dev to build the required files and then run the server locally.

The website should now be available at 127.0.0.1:8000 in your web browser.
