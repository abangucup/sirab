<!-- ## Sistem Informasi Pelaporan Rabies (SIRAB)

    - Sistem informasi pelaporan rabies dibuat sebagai pendukung SKRIPSI.
    - Sistem informasi ini dibuat belandaskan masalah yang ada di dinas kesehatan kota gorontalo terkait dengan pelaporan rabies oleh puskesmas ke dinas kesehatan kota gorontalo, yang setelahnya dinas kesehatan kota gorontalo akan melakukan rekapan data yang akan di berikan kepada dinas kesehatan provinsi dan kepada bidang P2PL dinas kesehatan kota gorontalo
    - Sistem informasi ini dikembangkan menggunakan bahasa pemrograman PHP dengan bantuan Framework LARAVEL sebgai template atau kerangka kerja MVC PHP
    - Sistem informasi ini dibuat untuk digunakan oleh puskesmas dan juga pemegang layanan  RABIES(P2PL dinas kesehatan kota)

## Fitur SIRAB

    - Penginputan data puskesmas dan user puskesmas oleh dinas kesehatan kota
    - Penginputan data masyarakat yang terkena penyakit rabies oleh puskesmas
    - Pelaporan data bulanan ataupun harian ke kepala puskesmas oleh puskes
    - Pelaporan data bulanan ataupun tahunan ke kepala bidang P2PL oleh pemegang layanan RABIES dinas kesehatan kota gorontalo
    - Dan Lainnya (Menunggu Pengembangan Selanjutnya)

## Copyright @ 2023 -->
## Clone Project

```bash
git clone https://github.com/abangucup/sirab.git
```

## Instalasi Project

```bash
composer install
```

```bash
php artisan key:generate
```

```bash
# npm install && npm run dev
```

## Setup Database

```bash
cp .env.example .env
```

```bash
nano .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database-anda
DB_USERNAME=usernama-database-anda
DB_PASSWORD=password-database-anda
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

