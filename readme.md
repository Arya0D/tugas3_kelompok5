# Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap
# Sistem Reservasi Penginapan dan Aktivitas Wisata

### KELOMPOK 5 : 
1. Amanda Dwi Safitri
2. Arya Dirham Wijaya Kusumah
3. Ji Rizky Cahyusna
4. JOsindo Radit Albaran
   
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
