<!doctype html>
<html>
<head>
    <title>Tambah Destinasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>
<div class="wrap">

    <header>
        <h1>Tambah Destinasi</h1>
    </header>

    <div style="width: 600px; margin: 50px auto; padding: 30px; background: #0f172a; border-radius: 10px; color:white;">
        
        <form method="post" action="<?= base_url('index.php/wisata/proses_tambah'); ?>" enctype="multipart/form-data">
            
            <label>Nama</label><br>
            <input type="text" name="nama" required placeholder="" style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Lokasi</label><br>
            <input type="text" name="lokasi" required placeholder="" style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Kategori</label><br>
            <select name="kategori" style="width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;">
                <option value="Pantai">Pantai</option>
                <option value="Gunung">Gunung</option>
                <option value="Air Terjun">Air Terjun</option>
                <option value="Alam">Alam</option>
                <option value="Lainnya">Lainnya</option>
            </select><br>

            <label>Deskripsi</label><br>
            <textarea name="deskripsi" rows="3" style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"></textarea><br>

            <label>Gambar Wisata</label><br>
            <input type="file" name="gambar" style="margin-bottom:15px;"><br>

            <label>Harga Domestik</label><br>
            <input type="number" name="harga_domestik" required style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>
            
            <label>Harga Mancanegara</label><br>
            <input type="number" name="harga_mancanegara" required style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Parkir Motor</label><br>
            <input type="number" name="parkir_motor" required style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Parkir Mobil</label><br>
            <input type="number" name="parkir_mobil" required style="width:96%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <button type="submit" class="btn btn-add" style="width:100%; cursor:pointer; font-weight:bold; font-size:16px; background:#22c55e; color:white; border:none; padding:10px; border-radius:5px;">Simpan</button>
            
            <p style="text-align:center; margin-top:20px;">
                <a href="<?= base_url('index.php/wisata'); ?>" style="color:yellow; text-decoration:none;">Batal & Kembali</a>
            </p>

        </form>
    </div>

</div>
</body>
</html>