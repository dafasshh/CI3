<!doctype html>
<html>
<head>
    <title>Cek Status Pesanan</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>
<div class="wrap">
    <header>
        <h1>Cek Status</h1>
        <nav>
            <a href="<?= base_url('index.php/wisata'); ?>">Beranda</a>
        </nav>
    </header>

    <div style="margin: 50px auto; max-width: 600px; text-align:center; color:white;">
        <h3>Cari Pesanan Kamu</h3>
        <form action="" method="get">
            <input type="text" name="keyword" placeholder="Masukkan Nama atau ID Pesanan..." style="padding:10px; width:70%;" required>
            <button type="submit" class="btn btn-add">Cari</button>
        </form>

        <br><br>

        <?php if($hasil): ?>
            <table style="width:100%; border:1px solid white; border-collapse:collapse;">
                <tr style="background:#1e293b;">
                    <th style="padding:10px;">ID</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
                <?php foreach($hasil as $h): ?>
                <tr>
                    <td style="padding:10px; border:1px solid #444;"><?= $h['id']; ?></td>
                    
                    <td style="border:1px solid #444;"><?= $h['nama']; ?></td>
                    
                    <td style="border:1px solid #444;">
                        <span style="color:<?= ($h['status']=='Lunas')?'#22c55e':'yellow'; ?>; font-weight:bold;">
                            <?= $h['status']; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif($this->input->get('keyword')): ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>