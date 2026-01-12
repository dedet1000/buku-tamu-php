<?php
include 'koneksi.php';

if (isset($_POST['kirim'])) {
    $nama  = htmlspecialchars($_POST['nama']);
    $pesan = htmlspecialchars($_POST['pesan']);

    mysqli_query($koneksi, "INSERT INTO tamu (nama, pesan) VALUES ('$nama', '$pesan')");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <header class="header">
        <h1>Buku Tamu Digital</h1>
        <p class="subtitle">Project PHP & MySQL Sederhana</p>
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
        $data = mysqli_query($koneksi, "SELECT * FROM tamu ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <div class="message-card">
                <h3><?= $row['nama']; ?></h3>
                <p><?= nl2br($row['pesan']); ?></p>
                <a href="hapus.php?id=<?= $row['ID']; ?>" 
                   class="delete-btn"
                   onclick="return confirm('Yakin ingin menghapus pesan?')">
                   Hapus
                </a>
            </div>
        <?php } ?>
        </div>
    </section>

    <footer class="footer">
        <p>© 2024 Buku Tamu Digital • PHP & MySQL</p>
        <p style="font-size: 0.8rem; color: #a0aec0; margin-top: 5px;">Dibuat untuk presentasi tugas sekolah</p>
    </footer>

</div>

</body>
</html>
