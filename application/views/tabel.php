<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>tabel</title>
</head>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
    </tr>
    <?php foreach ($mahasiswa as $mhs) { ?>
    <tr>
        <td><?php echo $mhs['nim']; ?></td>
        <td><?php echo $mhs['nama']; ?></td>
        <td><?php echo $mhs['jurusan']; ?></td>
        
    </tr>
    <?php } ?>
</body>
</html>