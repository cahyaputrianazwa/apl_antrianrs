<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .register-btn {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }
        .register-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <button type="submit" name="btn" class="btn btn-primary w-100 mb-2">Login</button>
            <a href="register.php" class="btn register-btn w-100">Register</a>
        </form>
        <?php 
        // PHP code for login
        if (isset($_POST['btn'])) {
            $username = $_POST['nama'];
            $email = $_POST['email'];

                $sqlclients = $conn->prepare("SELECT * FROM tb_user WHERE email = :email");
                $sqlclients->bindParam(':email', $email);

                if ($sqlclients->execute()) {
                    $row = $sqlclients->rowCount();

                    if ($row > 0) {
                        $result = $sqlclients->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['id'] = $result['id'];
                        $_SESSION['username'] = $result['username'];

                        header('location:index.php');
                        exit;
                    } else {
                        echo "<div class='text-danger mt-3'>User tidak ditemukan!</div>";
                    }
                } else {
                    echo "<div class='text-danger mt-3'>Terjadi kesalahan dalam eksekusi query.</div>";
                }
        {
                echo "<div class='text-danger mt-3'>Error: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
