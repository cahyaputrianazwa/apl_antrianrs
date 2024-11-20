<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e9f5fc;
            margin: 0;
            padding: 20px;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .btn-custom {
            color: white;
            background-color: #007bff;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-dashboard {
            margin-top: 20px;
            background-color: #007bff; /* Changed to blue */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            display: block;
            width: 200px;
            text-align: center;
            margin: 20px auto 0;
        }
        .btn-dashboard:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Daftar Antrian Pasien</h2>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM tb_antrian";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $antrian = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($antrian) > 0) {
            echo "<table class='table table-bordered table-striped'>
                <thead class='table-primary'>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nomor Antrian</th>
                        <th>Waktu Kedatangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
            $no = 1;
            foreach ($antrian as $row) {
                echo "<tr>
                    <td>" . $no . "</td>
                    <td>" . htmlspecialchars($row["nama_pasien"]) . "</td>
                    <td>" . htmlspecialchars($row["nomor_antrian"]) . "</td>
                    <td>" . htmlspecialchars($row["waktu_kedatangan"]) . "</td>
                    <td>" . htmlspecialchars($row["status"]) . "</td>
                    <td>
                        <a class='btn-custom' href='ubah_status.php?id=" . $row["id"] . "'>Ubah Status</a>
                        <a class='btn-custom' href='hapus_antrian.php?id=" . $row["id"] . "'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            echo "</tbody>
                </table>";
        } else {
            echo "<div class='alert alert-info text-center'>Tidak ada antrian.</div>";
        }
        $conn = null;
        ?>
        <!-- Tombol Kembali ke Dashboard -->
        <a href="index.php" class="btn btn-dashboard">Kembali ke Dashboard</a>
    </div>
</body>
</html>
