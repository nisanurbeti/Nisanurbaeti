<?php

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "mydb");

// Mendapatkan id dari URL
$id = $_GET["id"];

// Mengambil data dari database
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// Menampilkan data
echo "<h1>Edit Data Produk</h1>";
echo "<form action='edit.php?id=$id' method='post'>";
echo "<input type='hidden' name='id' value='$row[id]'>";
echo "<input type='text' name='nama' value='$row[nama]' placeholder='Nama'>";
echo "<input type='text' name='harga' value='$row[harga]' placeholder='Harga'>";
echo "<input type='submit' value='Simpan'>";
echo "</form>";


// Menghapus data
if (isset($_POST["nama"]) && isset($_POST["harga"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["harga"];

    mysqli_query($koneksi, "UPDATE tabel SET nama='$nama', harga='$harga' WHERE id='$id'");

    header("Location: show.php");
}

?>