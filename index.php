<?php
include 'config.php';

// Masukkan data ujian jika borang dihantar
if (isset($_POST['submit'])) {
    $nama_staf = $_POST['nama_staf'];
    $jenis_perkhidmatan = $_POST['jenis_perkhidmatan'];
    $kos = $_POST['kos'];

    $sql = "INSERT INTO services (nama_staf, jenis_perkhidmatan, kos) VALUES ('$nama_staf', '$jenis_perkhidmatan', '$kos')";
    $conn->query($sql);
    header("Location: index.php");
}

// Ambil semua data
$result = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>USM Service Tracking System - Testing</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .container { max-width: 800px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #4b0082; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4b0082; color: white; }
        input, button { padding: 8px; margin: 5px 0; width: 97%; }
        button { background-color: #4b0082; color: white; border: none; cursor: pointer; width: 100%; }
        button:hover { background-color: #36005c; }
    </style>
</head>
<body>

<div class="container">
    <h2>USM Service Recording & Tracking (Testing)</h2>
    
    <h3>Tambah Rekod Baru</h3>
    <form action="" method="POST">
        <label>Nama Staf:</label>
        <input type="text" name="nama_staf" required placeholder="Contoh: Aisyah Rahman">
        
        <label>Jenis Perkhidmatan:</label>
        <input type="text" name="jenis_perkhidmatan" required placeholder="Contoh: Format Laptop">
        
        <label>Kos (RM):</label>
        <input type="number" step="0.01" name="kos" required placeholder="Contoh: 50.00">
        
        <button type="submit" name="submit">Simpan Rekod</button>
    </form>

    <h3>Senarai Rekod Perkhidmatan</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Staf</th>
            <th>Perkhidmatan</th>
            <th>Kos (RM)</th>
            <th>Tarikh</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nama_staf']) ?></td>
                <td><?= htmlspecialchars($row['jenis_perkhidmatan']) ?></td>
                <td>RM <?= number_format($row['kos'], 2) ?></td>
                <td><?= $row['tarikh_cipta'] ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">Tiada rekod dijumpai.</td></tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>