<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barang</title>
</head>
<body>
    <h1>DATA barang</h1>
    <form method="POST" action="<?=site_url('barang/simpan')?>">
        <label>kd_barang </label><br><input type="text" name="kd_barang"required><br><br>
        <label>nama_barang </label><br><input type="text" name="nama_barang"required><br><br>
        <label>harga </label><br><input type="text" name="harga"required><br><br>
        <label>Satuan </label><br><input type="text" name="satuan"required><br><br>
        <button type="submit">simpan</button>
        </form>
</body>
</html>