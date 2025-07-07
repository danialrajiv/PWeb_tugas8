<?php
session_start();

// Inisialisasi variabel untuk data, agar tidak error jika diakses tanpa POST
$nama = $alamat = $jk = $agama = "Data tidak ditemukan";
$is_success = false;

// Cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){
    $is_success = true;

    // Ambil data dari formulir dan bersihkan
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jenis_kelamin']);
    $agama = htmlspecialchars($_POST['agama']);

    // Buat array data siswa baru
    $calon_siswa_baru = [
        'nama' => $nama,
        'alamat' => $alamat,
        'jenis_kelamin' => $jk,
        'agama' => $agama
    ];
    
    // Inisialisasi session 'calon_siswa' jika belum ada
    if (!isset($_SESSION['calon_siswa'])) {
        $_SESSION['calon_siswa'] = [];
    }
    
    // Tambahkan data siswa baru ke dalam session
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