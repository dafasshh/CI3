<!doctype html>
<html>
<head>
    <title>Login Administrator</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body>
<div class="wrap">
    
    <div style="width: 400px; margin: 100px auto; padding: 20px; background: #0f172a; border-radius: 10px; color:white;">
        <h2 style="text-align:center;">Login</h2>
        
        <?php if($this->session->flashdata('pesan')): ?>
            <div style="color: red; text-align: center; margin-bottom: 10px;">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('index.php/login/auth'); ?>">
            
            <label>Username</label><br>
            <input type="text" name="username" required style="width:94%; padding:10px; margin-bottom:15px; border-radius:5px; border:none;"><br>

            <label>Password</label><br>
            <input type="password" name="password" required style="width:94%; padding:10px; margin-bottom:15px; border-radius:5px; border:none;"><br>

            <button type="submit" class="btn btn-add" style="width:100%; cursor:pointer;">Login</button>
            
            <p style="text-align:center; margin-top:15px;">
                <a href="<?= base_url('index.php/wisata'); ?>" style="color:#aaa; text-decoration:none;">&larr; Kembali ke Beranda</a>
            </p>
        </form>
    </div>

</div>
</body>
</html>