<!doctype html>
<html>
<head>
    <title>Jelajah Wisata</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>

<div class="wrap">

    <header>
        <h1>Jelajah Wisata</h1>
        <nav>
            <a href="<?= base_url('index.php/wisata'); ?>">Beranda</a>
            
            <a href="<?= base_url('index.php/wisata/cek_status'); ?>">Cek Status</a>

            <?php if($this->session->userdata('role') == 'admin'): ?>
                <a href="<?= base_url('index.php/admin'); ?>">Verifikasi</a>
                
                <a href="<?= base_url('index.php/wisata/tambah'); ?>">Tambah Wisata</a>
            
            <?php endif; ?>

            <a href="<?= base_url('index.php/login/logout'); ?>">Logout</a>
        </nav>
    </header>

    <section class="grid">
        
        <?php if(!empty($wisata)): ?>
            <?php foreach($wisata as $w): ?>
            <div class="card" style="background-image:url('<?= base_url('assets/img/'.$w['gambar']); ?>')">
                <div class="content">
                    <b><?= $w['nama']; ?></b><br>
                    <span><?= $w['lokasi']; ?> • <?= $w['kategori']; ?></span>

                    <div class="admin-actions">
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                            <a class="btn btn-edit" href="<?= base_url('index.php/wisata/edit/'.$w['id']); ?>" style="background:orange; padding:5px 10px; color:white; text-decoration:none; border-radius:4px;">Edit</a>
                            
                            <a class="btn btn-delete" href="<?= base_url('index.php/wisata/hapus/'.$w['id']); ?>" style="background:red; padding:5px 10px; color:white; text-decoration:none; border-radius:4px;" onclick="return confirm('Hapus wisata?')">Hapus</a>

                        <?php else: ?>
                            
                            <a class="btn btn-add" href="<?= base_url('index.php/wisata/pesan/'.$w['id']); ?>">Pesan</a>
                        
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color:white; text-align:center;">Belum ada data wisata.</p>
        <?php endif; ?>

    </section>

</div>
</body>
</html>