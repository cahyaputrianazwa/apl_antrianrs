    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #007bff;
                color: white;
            }
            .welcome {
                text-align: center;
                margin-bottom: 30px;
            }
            .welcome h1 {
                font-size: 2.5rem;
                font-weight: bold;
            }
            .welcome p {
                font-size: 1.2rem;
            }
            .card-container {
                display: flex;
                gap: 20px;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }
            .card {
                width: 18rem;
                border: none;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                background-color: white;
            }
            .card .icon {
                font-size: 50px;
                color: #007bff;
            }
            .card-title {
                font-weight: bold;
            }
            .btn-primary {
                background-color: #007bff;
                border: none;
            }
            .btn-primary:hover {
                background-color: #0056b3;
            }
            .logout-btn {
                margin-top: 30px;
                background-color: #dc3545;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 1.1rem;
                border-radius: 5px;
            }
            .logout-btn:hover {
                background-color: #c82333;
            }
        </style>
    </head>
    <body>
        <!-- Welcome Section -->
        <div class="welcome">
            <h1>Selamat Datang</h1>
            <p>Kelola antrian Anda dengan cepat dan mudah.</p>
        </div>

        <!-- Card Section -->
        <div class="card-container">
            <!-- Card: Tambah Antrian -->
            <div class="card text-center">
                <div class="card-body">
                    <div class="icon mb-3">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h5 class="card-title">Tambah Antrian</h5>
                    <p class="card-text">Tambahkan data baru ke antrian dengan mudah.</p>
                    <a href="tambah_antrian.php" class="btn btn-primary">Tambah Antrian</a>
                </div>
            </div>
            <!-- Card: Daftar Antrian -->
            <div class="card text-center">
                <div class="card-body">
                    <div class="icon mb-3">
                        <i class="fas fa-list"></i>
                    </div>
                    <h5 class="card-title">Daftar Antrian</h5>
                    <p class="card-text">Lihat semua daftar antrian yang tersedia.</p>
                    <a href="daftar_antrian.php" class="btn btn-primary">Daftar Antrian</a>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div>
            <a href="logout.php" class="btn btn-danger" style="margin-top: 27px;">Logout</a>
        </div>
    </body>
    </html>
