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