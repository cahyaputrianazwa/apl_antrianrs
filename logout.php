<?php
// Mulai sesi
session_start();

// Hapus semua session
session_unset();

// Hancurkan sesi
session_destroy();

// Arahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>
