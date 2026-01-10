<?php
include 'koneksi.php';

if (isset($_POST['kirim'])) {
    $nama  = $_POST['nama'];
    $pesan = $_POST['pesan'];

    mysqli_query($koneksi, "INSERT INTO tamu (nama, pesan) VALUES ('$nama', '$pesan')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h2>Buku Tamu</h2>

        <form method="POST">
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
            <textarea name="pesan" placeholder="Masukkan Pesan" required></textarea>
            <button type="submit" name="kirim">Kirim</button>
        </form>

        <hr>

        <h3>Daftar Pesan</h3>

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM tamu ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($data)) {
            $nama = $row['nama'];
            $pesan = $row['pesan'];
            $id = $row['ID'];

            echo "<div class='pesan'>";
            echo "<strong>$nama</strong>";
            echo "<p>$pesan</p>";
            echo "<a href='hapus.php?id=$id' onclick=\"return confirm('Yakin ingin menghapus pesan ini?')\">Hapus</a>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
