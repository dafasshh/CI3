<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mahasiswa</title>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
    <form method="POST" action="<?=site_url('mahasiswa/simpan')?>">
        <label>nim </label><br><input type="text" name="nim"required><br><br>
        <label>nama </label><br><input type="text" name="nama"required><br><br>
        <label>jurusan </label><br><input type="text" name="jurusan"required><br><br>
        <button type="submit">simpan</button>
        </form>
</body>
</html>