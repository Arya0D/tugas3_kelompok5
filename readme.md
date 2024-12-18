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

# Mvc
## Controller
###Reservation Controller

```
<?php
// app/controllers/UserController.php
require_once '../app/models/Reservation.php';

class ReservationController {
    private $reservationModel;

    public function __construct() {
        $this->reservationModel = new Reservation();
    }

    public function index() {
        $reservation = $this->reservationModel->getAllReservation();
        $user = $this->reservationModel->getAlluser();
        require_once '../app/views/reservation/reservation.php';

    }

    public function create() {
        $accommadation = $this->reservationModel->getAllAccommodations();
        $user = $this->reservationModel->getAlluser();
        require_once '../app/views/reservation/create.php';
    }

    public function store() {
        $tanggal = $_POST['tanggal'];
        $penginapan = $_POST['penginapan'];
        $user=$_POST['user'];
        if($_POST['status_pembayaran'] === "true"){
            $status=1;
        }else{
            $status=0;
        }
        $this->reservationModel->add($tanggal, $status, $user, $penginapan);
        header('Location: /reservation/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $user = $this->reservationModel->find($id); // Assume find() gets user by ID
        $accommadation = $this->reservationModel->getAllAccommodations();
        $user = $this->reservationModel->getAlluser();
        require_once __DIR__ . '/../views/reservation/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->userModel->update($id, $data);
        if ($updated) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->userModel->delete($id);
        if ($deleted) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
            
        }
    }
}

```

### 1. index
```
public function index() {
    $reservation = $this->reservationModel->getAllReservation();
    $user = $this->reservationModel->getAlluser();
    require_once '../app/views/reservation/reservation.php';
}

```
Menampilkan sema data reservasi

### 2. Cretae
```
public function create() {
    $accommadation = $this->reservationModel->getAllAccommodations();
    $user = $this->reservationModel->getAlluser();
    require_once '../app/views/reservation/create.php';
}

```
Menambhkan data pada table reservasi

### 3. Store
```
public function store() {
    $tanggal = $_POST['tanggal'];
    $penginapan = $_POST['penginapan'];
    $user = $_POST['user'];
    if($_POST['status_pembayaran'] === "true"){
        $status = 1;
    } else {
        $status = 0;
    }
    $this->reservationModel->add($tanggal, $status, $user, $penginapan);
    header('Location: /reservation/index');
}

```
Menyimpan semua data reservasi yang diisi di form

### 4. Edit
```
public function edit($id) {
    $user = $this->reservationModel->find($id);
    $accommadation = $this->reservationModel->getAllAccommodations();
    $user = $this->reservationModel->getAlluser();
    require_once __DIR__ . '/../views/reservation/edit.php';
}

```
Untunk menedit atau mengubah data reservasi
### 5. Update
```
// Process the update request
    public function update($id, $data) {
        $updated = $this->userModel->update($id, $data);
        if ($updated) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }
```
Untuk mengupdate data reservasi

### 6. Delete
```
// Process delete request
    public function delete($id) {
        $deleted = $this->userModel->delete($id);
        if ($deleted) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
            
        }
    }
}
```
Menghapus semua datapada table reservasi atau menghapus data reservasi.

### Models
```
<?php
// app/models/User.php
require_once '../config/database.php';

class Reservation {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllReservation() {
        $query = $this->db->query("SELECT * FROM reservations join users on reservations.id_user = users.id_user join accommodations on reservations.id_penginapan = accommodations.id_penginapan");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUser() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAccommodations() {
        $query = $this->db->query("SELECT * FROM accommodations");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM reservations WHERE id_reservasi = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($tanggal, $status_pembayaran, $user,$penginapan) {
        $query = $this->db->prepare("INSERT INTO reservations (tanggal_reservasi, status_pembayaran, id_user, id_penginapan) VALUES (:tanggal, :status, :user,:penginapan)");
        $query->bindParam(':tanggal', $tanggal);
        $query->bindParam(':status', $status_pembayaran);
        $query->bindParam(':user', $user);
        $query->bindParam(':penginapan', $penginapan);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE users SET tanggal = :tanggal_reservasi, status_pembayaran = :status_pembayaran, id_user = :user, id_penginapan=:penginapan WHERE id_reservasi = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':status_pembayaran', $data['status_pembayaran']);
        $stmt->bindParam(':user', $data['user']);
        $stmt->bindParam(':penginapan', $data['penginapan']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM users WHERE id_reservasi = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

```
### 1. Properti dan konstraktor
```
private $db;

public function __construct() {
    $this->db = (new Database())->connect();
}

```
Properti $db digunakan untuk menyimpan koneksi kedatabase
konstruktor digunakan ketika kelas diinialisasi dia akan membuat koneksi database dengan memanggil connect() dari database

### 2. get All reservation
```
public function getAllReservation() {
    $query = $this->db->query("SELECT * FROM reservations join users on reservations.id_user = users.id_user join accommodations on reservations.id_penginapan = accommodations.id_penginapan");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

```
mengambil semua data dari tabel reservations dan melakukan join dengan tabel users dan accommodations untuk mendapatkan informasi lengkap tentang pengguna dan akomodasi terkait.

### 3. get All user
```
public function getAllUser() {
    $query = $this->db->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

```
mengambil semua data dari table user

### 4. get All acomodation
```
public function getAllAccommodations() {
    $query = $this->db->query("SELECT * FROM accommodations");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

```
mengambil semua data dari tabel acomodation

### 5. find
```
public function find($id) {
    $query = $this->db->prepare("SELECT * FROM reservations WHERE id_reservasi = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

```
Mengambil atu baris data berdasarkan id dari  tabel reservation

### 6. add
```
public function add($tanggal, $status_pembayaran, $user, $penginapan) {
    $query = $this->db->prepare("INSERT INTO reservations (tanggal_reservasi, status_pembayaran, id_user, id_penginapan) VALUES (:tanggal, :status, :user, :penginapan)");
    $query->bindParam(':tanggal', $tanggal);
    $query->bindParam(':status', $status_pembayaran);
    $query->bindParam(':user', $user);
    $query->bindParam(':penginapan', $penginapan);
    return $query->execute();
}

```
menambahkan data baru pada table reservation dengan parameter yang tertera di reservation

### 7. Update
```
public function update($id, $data) {
    $query = "UPDATE users SET tanggal = :tanggal_reservasi, status_pembayaran = :status_pembayaran, id_user = :user, id_penginapan = :penginapan WHERE id_reservasi = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':tanggal', $data['tanggal']);
    $stmt->bindParam(':status_pembayaran', $data['status_pembayaran']);
    $stmt->bindParam(':user', $data['user']);
    $stmt->bindParam(':penginapan', $data['penginapan']);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

```
Digunakan untuk memperbaharui data berdasarkan id

### 8. Delete
```
public function delete($id) {
    $query = "DELETE FROM users WHERE id_reservasi = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

```
Menghapus data berdasarkan id pada table reservation.






### Viuw
Views pada user ini memiliki 3 tampilan yaitu untuk create.php, edit.php dan index.php, sesuai dengan fungsi dari View dalam MVC yaitu untuk memberikan tampilan pada sistem untuk dapat berinteraksi dengan pengguna.
a. create.php Fungsi : Digunakan untuk menampilkan form pembuatan data baru (menambahkan reservasi).

b. edit.php Fungsi : Digunakan untuk menampilkan form pengeditan data pengguna yang sudah ada.

c. index.php Fungsi : Digunakan untuk menampilkan daftar semua data pengguna.
