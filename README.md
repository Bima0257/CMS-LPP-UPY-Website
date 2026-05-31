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
- **Dashboard** — Statistik dengan grafik pie (kategori artikel & dokumen)
- **Manajemen Artikel** — CRUD + upload thumbnail/gambar + kategori + sort order
- **Manajemen Dokumen** — CRUD + upload file + proteksi password + kategori
- **Manajemen Carousel** — CRUD + reorder + upload gambar
- **Manajemen Member** — CRUD + reorder + upload foto + sosial media
- **Manajemen Layanan** — CRUD
- **Manajemen Program Kerja** — CRUD + author ownership
- **Manajemen User** — CRUD (superadmin only) + role admin/superadmin
- **Manajemen Menu** — Edit label navbar
- **Manajemen Banner** — Upload banner background & footer background
- **Profil Organisasi** — Edit nama, deskripsi, visi, misi, logo, favicon, kontak
- **Pesan Masuk** — Lihat, tandai sudah dibaca, hapus
- **Pengaturan Profil** — Edit profil + ganti password + upload avatar

---

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Backend | PHP 8.2+, Laravel 12 |
| Frontend | Bootstrap 5, jQuery, Blade |
| CSS | Template UD-Stlyes + custom CSS |
| Database | SQLite (dev) / MySQL (production) |
| Cache | Database driver |
| Session | Database driver |
| Build | Vite + Tailwind CSS (tidak dipakai di frontend) |
| Library | Eloquent Sluggable, SweetAlert2, DataTables, ApexCharts, TinyMCE, Quill Editor |

---

## Struktur Folder

```
app/
├── Console/Commands/       # Artisan custom commands
├── Helpers/                 # PhoneHelper, SearchDateHelper
├── Http/
│   ├── Controllers/         # 19 controllers
│   ├── Middleware/           # AdminAuth, RoleAccess, SingleLogin, ExtendSession
│   └── Requests/            # 12 FormRequest validasi
├── Models/                  # 14 Eloquent models
├── Providers/               # AppServiceProvider
├── Services/                # 7 service classes (business logic)
└── Traits/                  # Searchable, UploadTrait
resources/views/
├── admin/                   # 15 admin dashboard views
├── components/
│   ├── admin/               # layout, navbar, sidebar, footer
│   └── landingpage/         # layout, navbar, footer
├── errors/                  # 404
├── landingpage/             # 11 halaman publik
└── vendor/pagination/       # Custom pagination
routes/
├── web.php                  # Semua route
└── console.php
public/
├── assets/                  # Template assets (CSS, JS, images)
├── assets_admin/            # Admin template assets
└── js/                      # home-page.js, post-page.js, document-page.js
```

---

## Instalasi

```bash
# Clone repository
git clone https://github.com/username/lpp-upy-website-cms.git
cd lpp-upy-website-cms

# Install dependencies
composer install
npm install

# Environment
cp .env.example .env
php artisan key:generate

# Storage link
php artisan storage:link

# Database (SQLite default)
php artisan migrate

# Build assets
npm run build

# Jalankan development server
php artisan serve
```

### Production Build

```bash
composer install --optimize-autoloader --no-dev
npm install && npm run build

# Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set .env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```

---

## Role & Akses

| Role | Akses |
|---|---|
| `superadmin` | Semua fitur termasuk manajemen user, carousel, member, kategori |
| `admin` | Artikel, dokumen, program kerja, pesan, profil sendiri |

---

## Route Utama

### Public
| Method | URI | Controller |
|---|---|---|
| GET | `/` | `LandingpageController@index` |
| GET | `/all-posts` | `PostLandingpageController@posts` |
| GET | `/post/{slug}` | `PostLandingpageController@show` |
| GET | `/all-document` | `DocumentLandingpageController@documents` |
| GET | `/abouts` | `LandingpageController@abouts` |
| GET | `/visi-misi` | `LandingpageController@visiMisi` |
| GET | `/teams` | `LandingpageController@teams` |
| GET | `/program-kerja` | `LandingpageController@timeline` |
| GET | `/service` | Route closure |
| POST | `/messages` | `MessageController@store` |

### Document Download
| Method | URI | Deskripsi |
|---|---|---|
| GET | `/documents/download/{id}` | Download dokumen (non-protected) |
| POST | `/documents/verify-password` | Verifikasi password dokumen |
| GET | `/documents/download-verified` | Download via token (5 menit) |

### Auth
| Method | URI |
|---|---|
| GET | `/login` |
| POST | `/authenticate` |
| GET | `/logout` |

### Admin (perlu login)
| Method | URI |
|---|---|
| GET | `/dashboard` |
| GET/POST | `/users-management` |
| GET/POST | `/posts-management` |
| GET/POST | `/documents-management` |
| GET/POST | `/carousels-management` |
| GET/POST | `/work-programs` |
| GET/POST | `/messages` |
| GET/PUT | `/profile` |

---

## Caching

Project menggunakan **database cache driver** dengan cache key prefix yang jelas:

- `lp_categories_all` — kategori artikel (1 jam)
- `carousels` — data carousel (10 menit)
- `latest_posts` — artikel terbaru (10 menit)
- `dashboard.*` — statistik dashboard (60 menit)
- `posts_page_*` — pagination artikel (10 menit, di-clear manual)
- `documents_*` — pagination dokumen (10 menit, versioned)
- `banner`, `menu`, `about_*` — data global (1 jam)

Cache di-invalidate secara manual di setiap operasi CRUD.

---

## Kontak

Dikembangkan oleh [bimabtw_](https://www.instagram.com/bimabtw_/).

LPP Universitas PGRI Yogyakarta.
