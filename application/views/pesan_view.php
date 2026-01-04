<!doctype html>
<html>
<head>
    <title>Pemesanan</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>
<div class="wrap">

    <header>
        <h1>Booking Tiket</h1>
    </header>

    <div style="width: 500px; margin: 50px auto; padding: 20px; background: #0f172a; border-radius: 10px; color:white;">
        
        <h2 style="text-align:center; margin-bottom:20px;">
            <?= $detail['nama']; ?>
        </h2>

        <form method="post" action="<?= base_url('index.php/wisata/proses_pesan'); ?>">
            
            <input type="hidden" name="id_wisata" value="<?= $detail['id']; ?>">
            
            <label>Nama Lengkap</label><br>
            <input type="text" name="nama" required placeholder="Nama" style="width:96%; padding:10px; margin-bottom:10px;"><br>

            <label>No HP</label><br>
            <input type="text" name="no_hp" required placeholder="No HP" style="width:96%; padding:10px; margin-bottom:10px;"><br>

            <label>Jumlah Tiket</label><br>
            <input type="number" name="jumlah" required placeholder="Jumlah" style="width:96%; padding:10px; margin-bottom:10px;"><br>
            
            <label>Tipe Tiket</label><br>
            <select name="tipe" style="width:100%; padding:10px; margin-bottom:10px;">
                <option value="Domestik">Domestik</option>
                <option value="Mancanegara">Mancanegara</option>
            </select><br>

            <label>Metode Pembayaran</label><br>
            <select name="metode" style="width:100%; padding:10px; margin-bottom:20px;">
                <option value="BCA">BCA</option>
                <option value="DANA">DANA</option>
                <option value="OVO">OVO</option>
            </select><br>

            <button type="submit" class="btn btn-add" style="width:100%; cursor:pointer;">PESAN SEKARANG</button>
            
            <p style="text-align:center; margin-top:15px;">
                <a href="<?= base_url('index.php/wisata'); ?>" style="color:yellow;">Batal</a>
            </p>

        </form>
    </div>

</div>
</body>
</html>