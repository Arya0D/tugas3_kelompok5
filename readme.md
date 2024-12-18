# Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap

## Informasi Umum
Proyek ini merupakan bagian dari kegiatan Praktisi Mengajar batch 5, antara [Politeknik Negeri Cilacap](https://pnc.ac.id/) dengan praktisi [I Nyoman Indra Darmawan](https://nyoman.id) untuk mata kuliah Praktikum Pemgrograman Web 2

## Deskripsi Proyek
Proyek ini merupakan aplikasi web sederhana yang menerapkan arsitektur Model-View-Controller (MVC) dengan menggunakan konsep Pemrograman Berorientasi Objek (OOP). Aplikasi ini adalah sebagai contoh yang dapat gunakan sebagai acuan bagi masing-masing kelompok dalam mengerjakan tugas.

## Tujuan
Tujuan dari praktikum ini adalah untuk memberikan pemahaman yang lebih baik tentang arsitektur MVC dalam pengembangan aplikasi web dan untuk meningkatkan kemampuan mahasiswa dalam menerapkan konsep OOP serta melakukan operasi CRUD (Create, Read, Update, Delete) pada data.

## Tech Stack
- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Version Control:** Git (GitLab)
- **Web Server:** Apache (dengan .htaccess untuk pengaturan URL)

## Struktur Proyek
```plaintext
mvc-sample/
├── app/
│   ├── controllers/
│   │   └── UserController.php         # Controller untuk mengelola logika pengguna
│   ├── models/
│   │   └── User.php                   # Model untuk mengelola data pengguna
│   └── views/
│       └── user/
│           ├── index.php              # View untuk menampilkan daftar dan manajemen pengguna
│           ├── edit.php               # Edit untuk menampilkan halaman edit pengguna            
│           └── create.php             # View untuk menampilkan form pembuatan pengguna baru
├── config/
│   └── database.php                   # Konfigurasi database
├── public/
│   ├── .htaccess                      # Pengaturan URL rewrite
│   └── index.php                      # Entry point aplikasi
├── .htaccess                          # Pengaturan URL rewrite
└── routes.php                         # Mendefinisikan rute untuk aplikasi
```

## Cara Menjalankan Proyek
1. **Clone Repository:**
   ```bash
   git clone https://gitlab.com/praktisi-mengajar/politeknik-negeri-cilacap/pemrograman-web/mvc-sample.git
   cd mvc-sample
   ```
2. **Jika menggunakan virtual host pada apache xampp:**
   Untuk menjalankan proyek ini pada Apache XAMPP, Anda perlu membuat virtual host:

   - Edit File Konfigurasi Apache: Buka file httpd-vhosts.conf di lokasi berikut:
        ```php 
        C:\xampp\apache\conf\extra\httpd-vhosts.conf 
        ```
   - Tambahkan Konfigurasi Virtual Host: Tambahkan konfigurasi berikut di bagian bawah file:
        ```php 
        <VirtualHost *:80>
            DocumentRoot "C:/xampp/htdocs/mvc-sample/public"
            ServerName mvc-sample.local
            <Directory "C:/xampp/htdocs/mvc-sample/public">
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
        ```
    - Edit File Hosts: Tambahkan entri baru pada file hosts di sistem windows :
        ```plaintext
        C:\Windows\System32\drivers\etc\hosts
        ```

    - Tambahkan baris berikut di bagian bawah:
        ```php 
        127.0.0.1 mvc-sample.local
        ```

    - Restart Apache: Setelah konfigurasi selesai, restart Apache melalui XAMPP Control Panel.

    - Akses Proyek: Buka browser dan akses aplikasi di http://mvc-sample.local.

3. **Jika menggunakan perintah php -S localhost:8080:**
    Saat menjalankan aplikasi PHP dengan perintah ```php -S localhost:8080```
    server built-in PHP hanya memahami struktur dasar dan tidak mendukung pengaturan URL rewriting seperti pada file ```.htaccess``` di Apache. Oleh karena itu, aplikasi tidak dapat menangani rute dinamis dengan benar dan akan menampilkan ```"Not Found"``` saat mengakses URL selain ```index.php``` langsung.

    Langkah yang harus diikuti:
    - Navigasi ke direktori ```mvc-sample``` dan jalankan server dari dalam folder ```public```, agar ```index.php``` langsung menjadi entry point untuk aplikasi:
        ```php
        cd mvc-sample/public
        php -S localhost:8080
        ```
    - Akses Proyek: Buka browser dan akses aplikasi di ```localhost:8080```.

## Kontribusi
Jika ingin berkontribusi pada proyek ini, silakan buat branch baru dan kirim pull request.

## Lisensi
Proyek ini dilisensikan under MIT License.

# MVC
## app
### controller
### activities controller
```
<?php
// app/controllers/UserController.php
require_once '../app/models/activities.php';

class ActivitiesController {
    private $userModel;

    public function __construct() {
        $this->activitiesModel = new Activities();
    }

    public function index() {
        $activities = $this->activitiesModel->getAllActivities();
        require_once '../app/views/activities/index.php';

    }

    public function create() {
        require_once '../app/views/activities/create.php';
    }

    public function store() {
        $nama_aktivitas = $_POST['nama_aktivitas'];
        $deskripsi = $_POST['deskripsi'];
        $lokasi_aktivitas = $_POST['lokasi_aktivitas'];
        $harga_aktivitas = $_POST['harga_aktivitas'];
        $this->activitiesModel->add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas);
        header('Location: /activities/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $activities = $this->activitiesModel->find($id); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/activities/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->activitiesModel->update($id, $data);
        if ($updated) {
            header("Location: /activities/index"); // Redirect to user list
        } else {
            echo "Failed to update activities.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->activitiesModel->delete($id);
        if ($deleted) {
            header("Location: /activities/index"); // Redirect to user list
        } else {
            echo "Failed to delete activities.";
        }
    }
}
```
### 1. Method dalam controller
```
public function index() {
    $activities = $this->activitiesModel->getAllActivities();
    require_once '../app/views/activities/index.php';
}

```
Mengambil semua data aktivitas menggunakan metode getAllActivities().

### 2. Create
```public function create() {
    require_once '../app/views/activities/create.php';
}

```
Membuat data baru pada table activities.

### 3. Store
```
public function store() {
    $nama_aktivitas = $_POST['nama_aktivitas'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi_aktivitas = $_POST['lokasi_aktivitas'];
    $harga_aktivitas = $_POST['harga_aktivitas'];
    $this->activitiesModel->add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas);
    header('Location: /activities/index');
}

```

Menyimpan data didalam store
### 4. Edit
```
public function edit($id) {
    $activities = $this->activitiesModel->find($id);
    require_once __DIR__ . '/../views/activities/edit.php';
}

```
Mengedit data pada table activities

### 5. Update
```
public function update($id, $data) {
    $updated = $this->activitiesModel->update($id, $data);
    if ($updated) {
        header("Location: /activities/index");
    } else {
        echo "Failed to update activities.";
    }
}

```

Mengupdate data paa table activities

### 6. Delete
```
public function delete($id) {
    $deleted = $this->activitiesModel->delete($id);
    if ($deleted) {
        header("Location: /activities/index");
    } else {
        echo "Failed to delete activities.";
    }
}

```
Menghapus data dari table activities
