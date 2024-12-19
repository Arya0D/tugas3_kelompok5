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

# PRAKTIKUM Web 2- POLITEKNIK NEGERI CILACAP
## Sistem Reservasi Penginapan dan Aktivitas Pariwisata

Sistem ini adalah web sederhana untuk mengelola data penginapan, termasuk fitur CRUD (Create, Read, Update, Delete) yang terintegrasi dengan aktivitas terkait. Web ini dibangun menggunakan PHP dengan pola MVC (Model-View-Controller).

**Fitur :**
- Menampilkan daftar penginapan.
- Menambahkan daftar penginapan baru.
- Mengedit data penginapan.
- Menghapus data penginapan.
- Menghubungkan penginapan dengan aktivitas terkait.
----------------------------------------------------------------------------

# Accommodations

Model ini mengikuti arsitektur MVC (Model-View-Controller)

## - MODEL
Model ini menyediakan fungsi-fungsi untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada tabel accommodations di database, serta hubungan dengan tabel activities.

1. Penggunaan Database Connection
```php
require_once '../config/database.php';
```
Fungsi Kode ini mengimpor konfigurasi koneksi database dari file database.php. File tersebut berisi fungsi atau kelas yang bertugas membuat koneksi ke database.

2. Kelas Accommodations
```php
class Accommodations {
    private $db;
```
- Kelas ini digunakan untuk mengatur dan mengelola data penginapan dalam tabel accommodations. Di dalamnya, terdapat berbagai metode yang mencakup fungsi CRUD (Create, Read, Update, Delete).
- Atribut ini menyimpan koneksi database yang diperoleh dari kelas Database

3. Konstruktor
```php
public function __construct() {
    $this->db = (new Database())->connect();
}
```
-- Konstruktor ini akan dipanggil ketika kelas di-instantiate. Metode ini:
Membuat koneksi ke database melalui kelas Database.
Menyimpan koneksi tersebut ke dalam atribut $db.

4. Metode CRUD
   
<b> a. getAllAccommodations </b>
```php
public function getAllAccommodations() {
    $query = $this->db->query("SELECT * FROM accommodations JOIN activities ON accommodations.id_aktivitas = activities.id_aktivitas");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
```
Fungsi ini membaca semua data dari tabel accommodations dengan menggabungkan (join) data dari tabel activities berdasarkan id_aktivitas.
Tujuan: Menampilkan daftar penginapan beserta aktivitas yang terkait.

<b> b. getAllActivities </b>
```php
public function getAllActivities() {
    $query = $this->db->query("SELECT * FROM activities");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
```
Fungsi ini mengambil semua data dari tabel activities, dan bertujuan Menampilkan daftar aktivitas yang tersedia.

<b> c. find </b>
```php
public function find($id) {
    $query = $this->db->prepare("SELECT * FROM accommodations JOIN activities ON accommodations.id_aktivitas = activities.id_aktivitas WHERE id_penginapan = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

```
Fungsi ini mencari data penginapan berdasarkan id_penginapan, dan bertujuan Menampilkan detail sebuah penginapan tertentu.

<b> d. add </b>
```php
public function add($nama_penginapan, $lokasi_penginapan, $fasilitas, $harga_penginapan, $id_aktivitas) {
    $query = $this->db->prepare("INSERT INTO accommodations (nama_penginapan, lokasi_penginapan, fasilitas, harga_penginapan, id_aktivitas) VALUES (:nama_penginapan, :lokasi_penginapan, :fasilitas, :harga_penginapan, :id_aktivitas)");
    $query->bindParam(':nama_penginapan', $nama_penginapan);
    $query->bindParam(':lokasi_penginapan', $lokasi_penginapan);
    $query->bindParam(':fasilitas', $fasilitas);
    $query->bindParam(':harga_penginapan', $harga_penginapan);
    $query->bindParam(':id_aktivitas', $id_aktivitas);
    return $query->execute();
}
```
- Fungsi ini digunakan untuk menambahkan data baru ke tabel accommodations, dan bertujuan Memasukkan data baru ke database.
- Parameter: Data yang diperlukan adalah nama, lokasi, fasilitas, harga penginapan, dan ID aktivitas terkait.
  
<b> e. update </b>
```php
public function update($id, $data) {
    $query = "UPDATE accommodations SET nama_penginapan = :nama_penginapan, lokasi_penginapan = :lokasi_penginapan, fasilitas = :fasilitas, harga_penginapan = :harga_penginapan, id_aktivitas = :id_aktivitas WHERE id_penginapan = :id_penginapan";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':nama_penginapan', $data['nama_penginapan']);
    $stmt->bindParam(':lokasi_penginapan', $data['lokasi_penginapan']);
    $stmt->bindParam(':fasilitas', $data['fasilitas']);
    $stmt->bindParam(':harga_penginapan', $data['harga_penginapan']);
    $stmt->bindParam(':id_aktivitas', $data['aktivitas']);
    $stmt->bindParam(':id_penginapan', $id);
    return $stmt->execute();
}
```
Fungsi ini memperbarui data penginapan berdasarkan id_penginapan, dan bertujuan Memodifikasi data penginapan yang ada di database.

<b> f. delete </b>
```php
public function delete($id) {
    $query = "DELETE FROM accommodations WHERE id_penginapan = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
```
Fungsi ini menghapus data penginapan berdasarkan id_penginapan, dan bertujuan Menghapus data dari database.


## - CONTROLLER

1. Kelas dan Atribut
```php
class AccommodationsController {
    private $accommodationsModel;
```
Fungsi ini Menyimpan instance dari model Accommodations, yang bertugas untuk berinteraksi dengan database.

2. Konstruktor
```php
public function __construct() {
    $this->accommodationsModel = new Accommodations();
}
```
Fungsi ini inisialisasi objek Accommodations saat controller ini dibuat dan Memungkinkan controller menggunakan metode dari model untuk berinteraksi dengan database.

3. Method index 
```php
public function index() {
    $accommodations = $this->accommodationsModel->getAllAccommodations();
    require_once '../app/views/accommodations/index.php';
}
```
Fungsi ini mengambil semua data penginapan dari database melalui model (getAllAccommodations), dan Memuat view index.php untuk menampilkan data tersebut dalam bentuk tabel.

4. Method create()
```php
public function create() {
    $activities = $this->accommodationsModel->getAllActivities();
    require_once '../app/views/accommodations/create.php';
}
```
Fungsi ini Mengambil data aktivitas (sebagai referensi) melalui model (getAllActivities), dan Memuat view create.php, halaman untuk menambahkan data penginapan baru

5. Method store()
```php
public function store() {
    $nama_penginapan = $_POST['nama_penginapan'];
    $lokasi_penginapan = $_POST['lokasi_penginapan'];
    $fasilitas = $_POST['fasilitas'];
    $harga_penginapan = $_POST['harga_penginapan'];
    $id_aktivitas = $_POST['aktivitas'];
    $this->accommodationsModel->add($nama_penginapan, $lokasi_penginapan, $fasilitas, $harga_penginapan, $id_aktivitas);
    header('Location: /accommodations/index');
}
```
Fungsi:
- Mengambil data dari formulir HTML (dikirim melalui POST).
- Memasukkan data ke database melalui metode add pada model.
- Mengarahkan kembali pengguna ke halaman daftar penginapan (/accommodations/index) setelah data ditambahkan.

6. Method edit($id)
```php
public function edit($id) {
    $accommodations = $this->accommodationsModel->find($id);
    $activities = $this->accommodationsModel->getAllActivities();
    require_once __DIR__ . '/../views/accommodations/edit.php';
}
```
Fungsi:
- Mengambil data penginapan berdasarkan id menggunakan metode find.
- Mengambil semua data aktivitas untuk referensi pilihan pada formulir.
- Memuat view edit.php untuk menampilkan data penginapan yang dapat diedit.

7. Method update($id, $data)
```php
public function update($id, $data) {
    $updated = $this->accommodationsModel->update($id, $data);
    if ($updated) {
        header("Location: /accommodations/index");
    } else {
        echo "Failed to update accommodations.";
    }
}
```
Fungsi:
- Memperbarui data penginapan dengan ID tertentu melalui model (update).
- Jika berhasil, pengguna diarahkan kembali ke halaman daftar penginapan.
- Jika gagal, menampilkan pesan error.

8. Method delete($id)
```php
public function delete($id) {
    $deleted = $this->accommodationsModel->delete($id);
    if ($deleted) {
        header("Location: /accommodations/index");
    } else {
        echo "Failed to delete accommodations.";
    }
}
```
Fungsi:
- Menghapus data penginapan berdasarkan ID melalui model (delete).
- Jika berhasil, pengguna diarahkan ke halaman daftar penginapan.
- Jika gagal, menampilkan pesan error.

## - VIEW
view pada accommodation berfungsi sebagai halaman yang dirancang untuk memfasilitasi interaksi pengguna dengan website, baik itu melihat data, menambahkan data, atau memperbarui data. 

<b>1. index.php</b>
<br>Fungsi:
- File ini digunakan untuk menampilkan daftar semua penginapan yang ada di database.
- Tabel ditampilkan untuk menampilkan detail seperti nama penginapan, lokasi, fasilitas, harga, dan nama aktivitas terkait.

<b>2. create.php</b>
<br>Fungsi:
- Digunakan untuk menampilkan formulir input bagi pengguna untuk menambahkan data penginapan baru ke database.
- Form ini menampilkan kolom input untuk nama penginapan, lokasi, fasilitas, harga, dan ID aktivitas.

<b>3. edit.php</b>
<br>Fungsi:
- Menampilkan formulir untuk mengedit data penginapan yang sudah ada.
- Form ini memuat data penginapan berdasarkan ID, yang diambil dari metode find() pada model.




















