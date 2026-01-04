<!doctype html>
<html>
<head>
    <title>Verifikasi Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <style>
        /* Tambahan dikit biar tabelnya rapi persis video */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; color: white;}
        th, td { padding: 12px; border: 1px solid #444; text-align: left; }
        th { background-color: #1e293b; }
        .btn-small { padding: 5px 10px; font-size: 12px; text-decoration: none; color: white; border-radius: 4px; display:inline-block; margin-right:5px;}
        .bg-green { background-color: #22c55e; }
        .bg-red { background-color: #ef4444; }
    </style>
</head>
<body>

<div class="wrap">

    <header>
        <h1>Jelajah Wisata</h1> <nav>
            <a href="<?= base_url('index.php/wisata'); ?>">Beranda</a>
            <a href="#">Cek Status</a> <a href="<?= base_url('index.php/admin'); ?>">Verifikasi</a>
            <a href="<?= base_url('index.php/wisata/tambah'); ?>">+ Wisata</a>
            <a href="<?= base_url('index.php/login/logout'); ?>">Logout</a>
        </nav>
    </header>

    <section>
        <h2>Verifikasi Pesanan</h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th> <th>Total</th>
                    <th>Status</th> <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pesanan as $p): ?>
                <tr>
                    <td><?= $p['id']; ?></td>
                    
                    <td><?= $p['nama']; ?></td>
                    
                    <td>Rp <?= number_format($p['total_harga'], 0, ',', '.'); ?></td>
                    
                    <td>
                        <?php 
                        $warna = 'white';
                        if($p['status']=='Menunggu') $warna='yellow';
                        if($p['status']=='Lunas') $warna='#22c55e';
                        if($p['status']=='Ditolak') $warna='red';
                        ?>
                        <span style="color: <?= $warna; ?>; font-weight:bold;">
                            <?= $p['status']; ?>
                        </span>
                    </td>

                    <td>
                        <?php if($p['status'] == 'Menunggu'): ?>
                            <a href="<?= base_url('index.php/admin/verifikasi/'.$p['id'].'/Lunas'); ?>" 
                               class="btn-small bg-green">Setujui</a>
                            
                            <a href="<?= base_url('index.php/admin/verifikasi/'.$p['id'].'/Ditolak'); ?>" 
                               class="btn-small bg-red" 
                               onclick="return confirm('Tolak pesanan ini?')">Tolak</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>

</div>

</body>
</html>