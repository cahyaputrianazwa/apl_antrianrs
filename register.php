<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4">Buat Akun</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <button type="submit" name="btn" class="btn btn-primary w-100 mb-2">Register</button>
        </form>
        <?php
        include 'koneksi.php'; // Pastikan file koneksi sudah benar
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validasi input
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';

            if (!empty($username) && !empty($email)) {
                try {
                    $sql = "INSERT INTO tb_user (username, email) VALUES (:username, :email)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);

                    if ($stmt->execute()) {
                        echo "<div class='text-success mt-3'>Akun berhasil dibuat!</div>";
                    } else {
                        echo "<div class='text-danger mt-3'>Error: Gagal menambahkan data.</div>";
                    }
                    header('location:index.php');
                    exit;
                } catch (PDOException $e) {
                    echo "<div class='text-danger mt-3'>Error: " . $e->getMessage() . "</div>";
                }
            } else {
                echo "<div class='text-danger mt-3'>Semua field harus diisi!</div>";
            }
        }
        ?>
    </div>
</body>
</html>
