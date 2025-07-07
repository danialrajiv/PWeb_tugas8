# **Laporan Tugas Pemrograman Web**
### **Aplikasi Pendaftaran Siswa Sederhana dengan PHP & Session**

- **Nama:** Danial Rajiv Syahidan
- **NRP** 5054231004
- **Mata Kuliah:** Pemrograman Web

---

#### **1. Deskripsi & Fitur Aplikasi**

Aplikasi ini adalah sebuah sistem pendaftaran siswa baru yang dibangun menggunakan PHP. Aplikasi ini bersifat multi-halaman dan dirancang untuk mensimulasikan alur pendaftaran dasar. Untuk penyimpanan data sementara, aplikasi ini menggunakan **PHP Session**, sehingga data pendaftar akan tersimpan selama sesi browser masih aktif.

Fitur utama dari aplikasi ini adalah:
- **Halaman Utama (`index.php`)**: Berisi menu navigasi untuk mendaftar atau melihat daftar pendaftar.
- **Formulir Pendaftaran (`form-daftar.php`)**: Halaman untuk menginput data siswa baru (Nama, Alamat, Jenis Kelamin, Agama).
- **Halaman Konfirmasi (`proses-pendaftaran.php`)**: Setelah submit formulir, pengguna akan melihat halaman konfirmasi yang menampilkan data yang baru saja dimasukkan.
- **Daftar Pendaftar (`list-siswa.php`)**: Menampilkan seluruh data siswa yang sudah mendaftar dalam bentuk tabel.
- **Fungsi Hapus**: Pengguna dapat menghapus data pendaftar dari daftar melalui tombol yang tersedia.
- **Desain Antarmuka**: Seluruh halaman menggunakan satu file CSS (`style.css`) untuk tampilan yang konsisten dan modern.

---

#### **2. Struktur File Proyek**
```
/pendaftaran-mahasiswa/
├── index.php
├── form-daftar.php
├── proses-pendaftaran.php
├── list-siswa.php
├── proses-hapus.php
└── style.css
```

---

#### **3. Kode Sumber (Source Code)**

Berikut adalah kode sumber untuk setiap file dalam proyek.

<details>
<summary><b>style.css</b> (Klik untuk melihat kode)</summary>

```css
/* style.css */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.container {
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
header {
    text-align: center;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 30px;
}
header h1, header h3 {
    margin: 0;
    color: #0056b3;
}
nav {
    text-align: center;
    margin-top: 20px;
}
nav a {
    text-decoration: none;
    color: #fff;
    background-color: #007BFF;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 0 10px;
    transition: background-color 0.3s ease;
}
nav a:hover {
    background-color: #0056b3;
}
.btn {
    display: inline-block;
    text-decoration: none;
    color: #fff;
    padding: 10px 18px;
    border-radius: 5px;
    margin: 5px;
    font-weight: 600;
    text-align: center;
}
.btn-delete { background-color: #dc3545; }
.btn-delete:hover { background-color: #c82333; }
.btn-add { background-color: #28a745; margin-bottom: 20px; }
.btn-add:hover { background-color: #218838; }
.btn-primary { background-color: #007BFF; }
.btn-primary:hover { background-color: #0056b3; }
.btn-secondary { background-color: #6c757d; }
.btn-secondary:hover { background-color: #5a6268; }
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table th, table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}
table thead {
    background-color: #007BFF;
    color: white;
}
table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}
fieldset { border: none; padding: 0; margin: 0; }
.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
.form-group input[type="text"],
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}
.radio-group { display: flex; align-items: center; gap: 25px; }
.radio-group label { font-weight: normal; display: flex; align-items: center; gap: 8px; }
.btn-submit {
    width: 100%; padding: 12px; background-color: #007BFF; color: white;
    border: none; border-radius: 5px; cursor: pointer; font-size: 16px;
    font-weight: bold; transition: background-color 0.3s ease;
}
.btn-submit:hover { background-color: #0056b3; }
.output-container {
    text-align: center;
}
.output-data {
    text-align: left;
    margin: 30px 0;
    padding: 20px;
    background-color: #f9f9f9;
    border-left: 5px solid #28a745;
}
.output-data p {
    font-size: 1.1em;
    margin: 10px 0;
}
.action-links {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 15px;
}
```
</details>

<details>
<summary><b>index.php</b> (Klik untuk melihat kode)</summary>

```php
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>SMK Coding</h1>
            <h3>Pendaftaran Siswa Baru</h3>
        </header>
        <h4>Menu</h4>
        <nav>
            <a href="form-daftar.php">Daftar Baru</a>
            <a href="list-siswa.php">Pendaftar</a>
        </nav>
    </div>
</body>
</html>
```
</details>

<details>
<summary><b>form-daftar.php</b> (Klik untuk melihat kode)</summary>

```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa | SMK Coding</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h3>Formulir Pendaftaran Siswa Baru</h3>
        </header>
        <form action="proses-pendaftaran.php" method="POST">
            <fieldset>
                <div class="form-group">
                    <label for="nama">Nama Lengkap: </label>
                    <input type="text" id="nama" name="nama" placeholder="Nama lengkap Anda" required />
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat: </label>
                    <textarea name="alamat" id="alamat" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin: </label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama: </label>
                    <select name="agama" id="agama">
                        <option>Islam</option>
                        <option>Kristen Protestan</option>
                        <option>Kristen Katolik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Daftar" name="daftar" class="btn-submit" />
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
```
</details>

<details>
<summary><b>proses-pendaftaran.php</b> (Klik untuk melihat kode)</summary>
    
```php
<?php
session_start();

$nama = $alamat = $jk = $agama = "Data tidak ditemukan";
$is_success = false;

if(isset($_POST['daftar'])){
    $is_success = true;
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jenis_kelamin']);
    $agama = htmlspecialchars($_POST['agama']);

    $calon_siswa_baru = [
        'nama' => $nama,
        'alamat' => $alamat,
        'jenis_kelamin' => $jk,
        'agama' => $agama
    ];
    
    if (!isset($_SESSION['calon_siswa'])) {
        $_SESSION['calon_siswa'] = [];
    }
    
    array_push($_SESSION['calon_siswa'], $calon_siswa_baru);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container output-container">
        <?php if($is_success): ?>
            <header>
                <h3 style="color: #28a745;">Pendaftaran Berhasil!</h3>
            </header>
            <div class="output-data">
                <p>Terima kasih, data Anda telah kami terima.</p>
                <p><strong>Nama:</strong> <?php echo $nama; ?></p>
                <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo $jk; ?></p>
                <p><strong>Agama:</strong> <?php echo $agama; ?></p>
            </div>
            <div class="action-links">
                <a href="list-siswa.php" class="btn btn-primary">Lihat Semua Pendaftar</a>
                <a href="index.php" class="btn btn-secondary">Kembali ke Menu Utama</a>
            </div>
        <?php else: ?>
            <header>
                <h3 style="color: #dc3545;">Akses Ditolak!</h3>
            </header>
            <p>Anda harus mengakses halaman ini dari formulir pendaftaran.</p>
            <div class="action-links">
                <a href="form-daftar.php" class="btn btn-primary">Isi Formulir</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
```
</details>

<details>
<summary><b>list-siswa.php</b> (Klik untuk melihat kode)</summary>
    
```php
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h3>Siswa yang sudah mendaftar</h3>
        </header>
        <nav>
            <a href="form-daftar.php" class="btn btn-add">[+] Tambah Baru</a>
        </nav>
        <br>
        <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['calon_siswa']) && !empty($_SESSION['calon_siswa'])) {
                $no = 1;
                foreach ($_SESSION['calon_siswa'] as $key => $siswa) {
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>";
                    echo "<a href='proses-hapus.php?id=".$key."' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data pendaftar.</td></tr>";
            }
            ?>
        </tbody>
        </table>
        <p>Total: <?php echo isset($_SESSION['calon_siswa']) ? count($_SESSION['calon_siswa']) : 0; ?></p>
    </div>
</body>
</html>
```
</details>

<details>
<summary><b>proses-hapus.php</b> (Klik untuk melihat kode)</summary>

```php
<?php
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_SESSION['calon_siswa'][$id])) {
        unset($_SESSION['calon_siswa'][$id]);
    }
    header('Location: list-siswa.php');
} else {
    die("Akses dilarang...");
}
?>
```
</details>

---

#### **4. Tangkapan Layar (Screenshot)**


**Halaman Utama**
![Halaman Utama](https://github.com/danialrajiv/PWeb_tugas8/blob/main/halaman_utama.png)

**Halaman Formulir**
![Halaman Formulir](https://github.com/danialrajiv/PWeb_tugas8/blob/main/halaman_form.png)

**Halaman Konfirmasi**
![Halaman Konfirmasi](https://github.com/danialrajiv/PWeb_tugas8/blob/main/halaman_konfirmasi.png)

**Halaman Daftar Pendaftar**
![Halaman Daftar](https://github.com/danialrajiv/PWeb_tugas8/blob/main/halaman_list_pendaftar.png)

---
