<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE tb_antrian SET status = 'selesai' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()){    
        echo "status pasien berhasil diubah menjadi selesai!"; 
        header('location:daftar_antrian.php');
        exit;  
    }else{
        echo "eror: gagal mengubah status.";
     }
 }
 $conn = null;
 ?>
        
    

    