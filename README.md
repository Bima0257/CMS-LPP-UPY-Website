# LPP-UPY Website CMS

Website resmi **Lembaga Pengembangan Pendidikan (LPP) Universitas PGRI Yogyakarta (UPY)** — dibangun dengan Laravel 12.

> **Website:** [https://lpp.upy.ac.id/](https://lpp.upy.ac.id/)

---

## Fitur

### Halaman Publik
- **Beranda** — Hero carousel, about, dokumen terbaru, artikel, tim, layanan, kontak
- **Artikel** — Daftar artikel dengan pencarian, filter kategori, filter tanggal, sorting, pagination responsive
- **Dokumen** — Daftar dokumen dengan tampilan grid/table, pencarian, filter, download (termasuk dokumen terproteksi password)
- **Timeline Program Kerja** — Program kerja dikelompokkan per tahun/bulan
- **Halaman About, Visi-Misi, Tim, Layanan**

### Admin Dashboard
- Dashboard statistik dengan grafik
- Manajemen artikel, dokumen, carousel, member, layanan, program kerja
- Manajemen user, menu navbar, banner
- Pengaturan profil organisasi (logo, kontak, visi-misi)
- Kotak pesan masuk
- Manajemen file (gambar, dokumen)

---

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Backend | PHP 8.2+, Laravel 12 |
| Frontend | Bootstrap 5, jQuery, Blade |
| Database | SQLite (dev) / MySQL (production) |
| Build | Vite |
| Library | SweetAlert2, DataTables, ApexCharts, TinyMCE, Quill Editor |

---

## Instalasi

```bash
git clone https://github.com/username/lpp-upy-website-cms.git
cd lpp-upy-website-cms

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan storage:link
php artisan migrate

npm run build
php artisan serve
```

### Production

```bash
composer install --optimize-autoloader --no-dev
npm install && npm run build

php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Set variabel `.env`:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```

---

## Requirements

- PHP ^8.2
- Composer
- Node.js & npm
- Database (SQLite / MySQL)

---

## Kontak

Dikembangkan oleh [bimabtw_](https://www.instagram.com/bimabtw_/).

LPP Universitas PGRI Yogyakarta.
