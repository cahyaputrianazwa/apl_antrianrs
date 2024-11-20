<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_antrian WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {    
        echo "data antrian berhasil di hapus!";   
        header('location:daftar_antrian.php');
        exit;
    }else{
        echo "eror: gagal mengubah status.";
     }
 }
 $conn = null;
 ?>
        
    

    