<!doctype html>
<html>
<head>
    <title>Edit Wisata</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>
<div class="wrap">
    <header><h1>Edit Wisata</h1></header>
    <div style="width: 600px; margin: 50px auto; padding: 30px; background: #0f172a; border-radius: 10px; color:white;">
        
        <form method="post" action="<?= base_url('index.php/wisata/proses_edit'); ?>" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?= $wisata['id']; ?>">

            <label>Nama Tempat Wisata</label><br>
            <input type="text" name="nama" value="<?= $wisata['nama']; ?>" required style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Lokasi</label><br>
            <input type="text" name="lokasi" value="<?= $wisata['lokasi']; ?>" required style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <label>Kategori</label><br>
            <select name="kategori" style="width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;">
                <option value="<?= $wisata['kategori']; ?>"><?= $wisata['kategori']; ?> (Saat Ini)</option>
                <option value="Pantai">Pantai</option>
                <option value="Gunung">Gunung</option>
                <option value="Air Terjun">Air Terjun</option>
                <option value="Alam">Alam</option>
            </select><br>

            <label>Deskripsi</label><br>
            <textarea name="deskripsi" rows="3" style="width:96%; padding:10px; margin-bottom:15px; border-radius:5px; border:none; background:#1e293b; color:white;"><?= $wisata['deskripsi']; ?></textarea><br>

            <label>Gambar Wisata</label><br>
            <div style="margin-bottom:15px; background: #1e293b; padding: 10px; border-radius: 5px;">
                <img src="<?= base_url('assets/img/'.$wisata['gambar']); ?>" style="width:120px; border-radius:5px; display:block; margin-bottom:10px; border: 1px solid #555;">
                
                <span style="font-size:13px; color:#aaa;">Ganti gambar (Biarkan kosong jika tidak diganti):</span><br>
                <input type="file" name="gambar" style="margin-top:5px;">
            </div>

            <label>Harga Tiket (Domestik)</label><br>
            <input type="number" name="harga" value="<?= $wisata['harga_domestik']; ?>" required style="width:96%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; background:#1e293b; color:white;"><br>

            <button type="submit" class="btn btn-add" style="width:100%; cursor:pointer; background:#22c55e; color:white; padding:10px; border-radius:5px; font-weight:bold;">UPDATE DATA</button>
            <br><br>
            <a href="<?= base_url('index.php/wisata'); ?>" style="color:yellow;">Batal</a>
        </form>
    </div>
</div>
</body>
</html>