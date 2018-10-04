# Github Jobs API build with Laravel

### Instalasi

Kita membutuhkan Composer untuk menginstall Laravel. Disini Composer berfungi untuk mengelola dependensinya. Kita bisa mendownload composer [disini](https://getcomposer.org/).

Siapkan juga Server Requirements nya.

* PHP >= 7.1.3
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension

Selanjutnya kita harus menduplikasi repository ini dengan cara **git clone [url]**. Jalankan perintah berikut pada terminal:

> git clone https://github.com/rikopernando/dreamaxtion-laravel.git

Perintah ini akan menduplikasi repository ini ke directory local kita. Silahkan masuk ke directory tersebut dengan cara:

> cd dreamaxtion-laravel

Kemudian jalankan perintah berikut:

> composer installl

Setelah selesai kita harus mengatur permission folder **storage** dan **bootstrap/cache**. Jalankan perintah berikut:

```
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```

### Konfigurasi Database

Silakan buka file .env.example dan copy isinya ke file .env , jika belum ada, silakan buat file nya manual. Masukan nama database, username dan password yang akan kita gunakan.

```
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=password
```

Dan jangan lupa untuk mengatur application key, karena jika sampai terlewati **session dan data terenskripsi** lainnya tidak akan aman. Caranya jalankan perintah berikut:

``` 
php artisan key:generate
```

Serta jalankan migration dan seeder yang telah ada

```
php artisan migrate:refresh --seed
```


### Usage

Kita akan menggunankan Local **Development Server** untuk mengakses API ini. Silakan jalankan perintah ini:

```
php artisan serve
```

maka output yang dihasilkan akan seperti ini:

> Laravel development server started: <http://127.0.0.1:8000>

ini artinya kita akan memulai server pengembangan di http: // localhost: 8000.

Silakan kunjungi http: // localhost: 8000.

![af](https://i.imgsafe.org/6d/6da618bb36.png)

### Autentikasi API Token

Untuk mengamankan endpoint API, kita akan menggunakan metode API Token.

Sekarang mari kita coba panggil API endpoint yang sudah ada, diantarnya sebagai berikut:

Route | HTTP | Description
------------ | -------------| -------------|
/api/jobs | GET | Untuk melihat daftar pekerjaan yang tersedia
/api/jobs/search | GET | Untuk mencari daftar pekerjaan yang tersedia secara detail

Untuk mencari daftar pekerjaan, anda bisa mencari berdasarkan full time, lokasi, full time atau part time, atau kombinasi dari ketiganya. Semua parameter bersifat opsional.

Paramaters | Description
------------ | -------------
description | Deskripsi pekerjaan, misal : "ruby" atau "JavaScript"
location | Nama kota, kode pos, atau yang berkaitan dengan lokasi
lat | lintang tertentu. Jika digunakan, Anda juga harus mengirim panjang dan tidak boleh mengirim lokasi.
long | Bujur spesifik. Jika digunakan, Anda juga harus mengirim lat dan tidak boleh mengirim lokasi.
fulltime | Jika ingin membatasi hasil ke posisi fulltime, atur parameter ini ke 'true'.

#### Contoh
* http://localhost:8000/api/jobs/search?description=python&location=sf&full_time=true
* http://localhost:8000/api/jobs/search?lat=37.3229978&long=-122.0321823

Kita juga bisa menggunakan pagination, secara default pagination sama dengan 0.

#### Contoh
* http://localhost:8000/api/jobs/search?description=ruby&page=1

Sekarang mari kita uji dengan menggunakan Postman atau Curl.

![af](https://i.imgsafe.org/6e/6e342619ba.png)

Hasil nya "error": "Unauthenticated" . itu karena tidak ada record user dengan api_token xxx.

Sekarang coba lagi jalankan request di postman seperti contoh sebelumnya, tapi dengan api_token yang valid.

Untuk mendapatkan api_token silahkan melihat di database masing masing (menggunakan PHPMyAdmin, Sequel Pro, MySQL Workbench, etc).

Uji coba pertama dengan api token yang valid

![af](https://i.imgsafe.org/6e/6e6941a5fc.png)

Uji kedua dengan api token serta dengan pencarian description jobs

![af](https://i.imgsafe.org/6e/6e716cd3ff.png)

Setiap request ke url / route yang menggunakan middleware api:auth maka harus menyertakan header Authorization dengan parameter Bearer **apitokenkamu**.

![af](https://i.imgsafe.org/6e/6e796d9632.png)

dan juga perlu diperhatikan disini kita membatasi akses ke API hanya 10 kali dalam 5 menit.







