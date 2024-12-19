# Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap
# Sistem Reservasi Penginapan dan Aktivitas Wisata

### KELOMPOK 5 : 
1. Amanda Dwi Safitri (230102050)
2. Arya Dirham Wijaya Kusumah (230202054)
3. Ji Rizky Cahyusna (230102063)
4. Josindo Radit Albaran (230202064)

Sistem ini adalah web sederhana untuk mengelola data pengguna,aktivitas,reservasi dan penginapan, termasuk fitur CRUD (Create, Read, Update, Delete) yang terintegrasi dengan aktivitas terkait. Web ini dibangun menggunakan PHP dengan pola MVC (Model-View-Controller).

**Fitur :**
- Menampilkan daftar user, activities, accomodations dan reservation.
- Menambahkan daftar user, activities, accomodations dan reservation.
- Mengedit data user, activities, accomodations dan reservation.
- Menghapus data user, activities, accomodations dan reservation.
- Merelasikan semua tabel user, activities, accomodations dan reservation.

Dalam Sistem Reservasi Penginapan dan Aktivitas Pariwisata terdiri atas 4 tabel yang dibangun menggunakan metode MVC, yaitu :
a. Table User
b. Table Activities
c. Table Accomodations
d. Table Reservation

----------------------------------------------------------------------------

## MVC
Model View Controller atau yang dapat disingkat MVC adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:

- Model
Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.

- View
Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI).

- Controller
Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.


# User
## - Controller

### 1. Properti

```php
private $userModel;
```

Properti ini digunakan untuk menyimpan instance dari model User. Model ini akan digunakan untuk berkomunikasi dengan database.

### 2. Konstruktor

```php
public function __construct() {
    $this->userModel = new User();
}
```

Konstruktor ini dijalankan otomatis saat objek UserController dibuat.
User adalah model yang digunakan untuk menjalankan query ke database. Di sini, model diinisialisasi dan disimpan ke dalam properti $userModel.

### 3. Method index()

```php
public function index() {
    $users = $this->userModel->getAllUsers();
    require_once '../app/views/user/index.php';
}
```

Fungsi : Mengambil data dari database dan mengirimkannya ke index.php

### 4. Method create()
```php
public function create() {
    require_once '../app/views/user/create.php';
}
```

Fungsi : Menampilkan form untuk menambahkan pengguna baru.

### 5. Method store()
```php
public function store() {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $this->userModel->add($nama, $email, $nomor_telepon);
    header('Location: /user/index');
}
```

Fungsi : Menyimpan data pengguna baru ke database

### 6. Method edit()
```php
public function edit($id) {
    $user = $this->userModel->find($id);
    require_once __DIR__ . '/../views/user/edit.php';
}
```

Fungsi : Menampilkan form untuk mengedit data pengguna berdasarkan ID.

### 7. Method update()
```php
public function update($id, $data) {
    $updated = $this->userModel->update($id, $data);
    if ($updated) {
        header("Location: /user/index");
    } else {
        echo "Failed to update user.";
    }
}
```

Fungsi : Memproses permintaan untuk memperbarui data pengguna di database.

### 8. Method delete()
```php
public function delete($id) {
    $deleted = $this->userModel->delete($id);
    if ($deleted) {
        header("Location: /user/index");
    } else {
        echo "Failed to delete user.";
    }
}
```
Fungsi : Menghapus data pengguna dari database

## - Model
### 1. Konstruktor

```php
public function __construct() {
    $this->db = (new Database())->connect();
}
```

Fungsi : Saat objek User diinisialisasi, koneksi ke database diambil dari class Database menggunakan metode connect().

### 2. getAllUsers()
```php
public function getAllUsers() {
    $query = $this->db->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
```

Fungsi : Mengambil semua data pengguna dari tabel users.

### 3. find
```php
public function find($id) {
    $query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
```

Fungsi : Mengambil data pengguna berdasarkan ID dari tabel users.

### 4. add
```php
public function add($nama, $email, $nomor_telepon) {
    $query = $this->db->prepare("INSERT INTO users (nama, email, nomor_telepon) VALUES (:nama, :email, :nomor_telepon)");
    $query->bindParam(':nama', $nama);
    $query->bindParam(':email', $email);
    $query->bindParam(':nomor_telepon', $nomor_telepon);
    return $query->execute();
}
```

Fungsi : Menambahkan data pengguna baru ke tabel users.

### 5. update 
```php
public function update($id, $data) {
    $query = "UPDATE users SET nama = :nama, email = :email, nomor_telepon = :nomor_telepon WHERE id_user = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':nomor_telepon', $data['nomor_telepon']);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
```

Fungsi : Memperbarui data pengguna berdasarkan ID.

### 6. delete
```php
public function delete($id) {
    $query = "DELETE FROM users WHERE id_user = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
```

Fungsi : Menghapus data pengguna dari tabel users berdasarkan ID.

## - Views
Views pada user ini memiliki 3 tampilan yaitu untuk create.php, edit.php dan index.php, sesuai dengan fungsi dari View dalam MVC yaitu untuk memberikan tampilan pada sistem untuk dapat berinteraksi dengan pengguna.
<br>
a. create.php
Fungsi : Digunakan untuk menampilkan form pembuatan data baru (menambahkan pengguna).

b. edit.php
Fungsi : Digunakan untuk menampilkan form pengeditan data pengguna yang sudah ada.

c. index.php
Fungsi : Digunakan untuk menampilkan daftar semua data pengguna.

# Accommodations

Model ini mengikuti arsitektur MVC (Model-View-Controller), dengan tugas utama berinteraksi dengan database menggunakan PDO (PHP Data Objects).

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

## Reservation

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
Menghapus semua data pada table reservasi atau menghapus data reservasi.

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
Mengambil satu baris data berdasarkan id dari tabel reservation

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
Views pada user ini memiliki 3 tampilan yaitu untuk create.php, edit.php dan index.php, sesuai dengan fungsi dari View dalam MVC yaitu untuk memberikan tampilan pada sistem untuk dapat berinteraksi dengan reservasi.
a. create.php Fungsi : Digunakan untuk menampilkan form pembuatan data baru (menambahkan reservasi).

b. edit.php Fungsi : Digunakan untuk menampilkan form pengeditan data reservasi yang sudah ada.

c. index.php Fungsi : Digunakan untuk menampilkan daftar semua data reservasi.

## Activities

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

Mengupdate data pada table activities

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

### Models
```
 <?php
// app/models/User.php
require_once '../config/database.php';

class Activities {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllactivities() {
        $query = $this->db->query("SELECT * FROM activities");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM activities WHERE id_aktivitas = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas) {
        $query = $this->db->prepare("INSERT INTO activities (nama_aktivitas, deskripsi, lokasi_aktivitas, harga_aktivitas) VALUES (:nama_aktivitas, :deskripsi, :lokasi_aktivitas, :harga_aktivitas)");
        $query->bindParam(':nama_aktivitas', $nama_aktivitas);
        $query->bindParam(':deskripsi', $deskripsi);
        $query->bindParam(':lokasi_aktivitas', $lokasi_aktivitas);
        $query->bindParam(':harga_aktivitas', $harga_aktivitas);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE activities SET nama_aktivitas = :nama_aktivitas, deskripsi = :deskripsi, lokasi_aktivitas = :lokasi_aktivitas, harga_aktivitas = :harga_aktivitas  WHERE id_aktivitas = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_aktivitas', $data['nama_aktivitas']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':lokasi_aktivitas', $data['lokasi_aktivitas']);
        $stmt->bindParam(':harga_aktivitas', $data['harga_aktivitas']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM activities WHERE id_aktivitas = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

```
### 1. Import dan Inisialisasi Koneksi Database
```
require_once '../config/database.php';

class Activities {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }
}

```
Mengimpor file database yang mendefinisikan kelas database

### 2. get All activities
```
public function getAllactivities() {
    $query = $this->db->query("SELECT * FROM activities");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

```
Mengambil semua data dari table activities

### 3. find
```
public function find($id) {
    $query = $this->db->prepare("SELECT * FROM activities WHERE id_aktivitas = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

```
Mencari aktivitas berdasarkan id

### 4. add
```
public function add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas) {
    $query = $this->db->prepare("INSERT INTO activities (nama_aktivitas, deskripsi, lokasi_aktivitas, harga_aktivitas) VALUES (:nama_aktivitas, :deskripsi, :lokasi_aktivitas, :harga_aktivitas)");
    $query->bindParam(':nama_aktivitas', $nama_aktivitas);
    $query->bindParam(':deskripsi', $deskripsi);
    $query->bindParam(':lokasi_aktivitas', $lokasi_aktivitas);
    $query->bindParam(':harga_aktivitas', $harga_aktivitas);
    return $query->execute();
}

```
Menambahkan aktivitas baru

### 5. Update
```
public function update($id, $data) {
    $query = "UPDATE activities SET nama_aktivitas = :nama_aktivitas, deskripsi = :deskripsi, lokasi_aktivitas = :lokasi_aktivitas, harga_aktivitas = :harga_aktivitas WHERE id_aktivitas = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':nama_aktivitas', $data['nama_aktivitas']);
    $stmt->bindParam(':deskripsi', $data['deskripsi']);
    $stmt->bindParam(':lokasi_aktivitas', $data['lokasi_aktivitas']);
    $stmt->bindParam(':harga_aktivitas', $data['harga_aktivitas']);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

```
Mengupdate atau memperbaharui data ktivitas

### 6. Delete
```
public function delete($id) {
    $query = "DELETE FROM activities WHERE id_aktivitas = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

```
Menghapus data aktivitas

### View
Views pada user ini memiliki 3 tampilan yaitu untuk create.php, edit.php dan index.php, sesuai dengan fungsi dari View dalam MVC yaitu untuk memberikan tampilan pada sistem untuk dapat berinteraksi dengan aktivitas.
a. create.php Fungsi : Digunakan untuk menampilkan form pembuatan data baru (menambahkan data aktivitas).
b. edit.php Fungsi : Digunakan untuk menampilkan form pengeditan data aktivitas yang sudah ada.
c. index.php Fungsi : Digunakan untuk menampilkan daftar semua data aktivitas




















