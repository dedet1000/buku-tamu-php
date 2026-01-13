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

    <header class="header">
        <h1>Buku Tamu Digital</h1>
    </header>

    <!-- FORM -->
    <section class="form-section">
        <h2>Tulis Pesan</h2>

        <form method="POST">
            <div class="form-group">
                <label>Nama *</label>
                <input type="text" name="nama" required placeholder="Masukkan nama Anda">
            </div>

            <div class="form-group">
                <label>Pesan *</label>
                <textarea name="pesan" required placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <button type="submit" name="kirim" class="submit-btn">Kirim Pesan</button>
        </form>
    </section>

    <!-- DAFTAR PESAN -->
    <section class="messages-section">
        <h2>Daftar Pesan</h2>

        <div class="messages-list">
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM tamu ORDER BY ID DESC");

        while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <div class="message-card">
                <h3><?= $row['nama']; ?></h3>
                <p><?= nl2br($row['pesan']); ?></p>
                <a href="hapus.php?ID=<?= $row['ID']; ?>" 
                   class="delete-btn"
                   onclick="return confirm('Yakin ingin menghapus pesan?')">
                   Hapus
                </a>
            </div>
        <?php } ?>
        </div>
    </section>

    <footer class="footer">
        <p>©Buku Tamu Digital</p>
    </footer>

</div>

</body>
</html>