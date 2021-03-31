#XL-AXIATA <br>Suervei AVA Central

##Panduan
* Clone project menggunakan <code> git clone https://github.com/dwicahyadi/survey-xl.git nama_project </code>
* Masuk ke project tersebut <code> cd nama_project </code>
* Install package yang dibutuhkan <code> composer install </code>
* Install asset yang dibutuhkan <code> npm install && npm run prod </code>
* Copy .env dari .enc.example <code>cp .env.example .env</code>
* Jalankan <code>php artisan key:generate</code>
* Update file .env <br>APP_NAME="Nama Aplikasi"<br>APP_DEBUG=false<br>DB_DATABASE=nama_db<br>DB_USERNAME=user<br>DB_PASSWORD=pass<br>  
* Terapkan config baru dengan <code>php artisan config:cache</code>
* Jalankan migrasi <code>php artisan migrate --force</code>
* Jalankan <code>php artisan db:seed</code>
* Jalankan <code>php artisan storage:link</code>
