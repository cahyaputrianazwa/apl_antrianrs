<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pasien = $_POST['nama_pasien'];
    $nomor_antrian = $_POST['nomor_antrian'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];

    $sql = "INSERT INTO tb_antrian(nama_pasien, nomor_antrian, waktu_kedatangan) VALUES (:nama_pasien, :nomor_antrian,:waktu_kedatangan)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama_pasien', $nama_pasien);
    $stmt->bindParam(':nomor_antrian', $nomor_antrian);
    $stmt->bindParam(':waktu_kedatangan', $waktu_kedatangan);

    if ($stmt->execute()) { 
        header('location:daftar_antrian.php');
        exit;
    } else {
        echo "Error: gagal menambahkan data.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e9f5fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h3 class="text-center text-primary mb-4">Tambah Antrian</h3>
        <form method="POST" action="tambah_antrian.php">
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan nama pasien" required>
            </div>
            <div class="mb-3">
                <label for="nomor_antrian" class="form-label">Nomor Antrian</label>
                <input type="number" class="form-control" id="nomor_antrian" name="nomor_antrian" placeholder="Masukkan nomor antrian" required>
            </div>
            <div class="mb-3">
                <label for="waktu_kedatangan" class="form-label">Waktu Kedatangan</label>
                <input type="datetime-local" class="form-control" id="waktu_kedatangan" name="waktu_kedatangan" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Tambah Antrian</button>
        </form>
    </div>
</body>
</html>
