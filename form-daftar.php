<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa | SMANSA</title>
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