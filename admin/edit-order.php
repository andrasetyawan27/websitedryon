<?php
session_start();
include('db.php'); // Pastikan file db.php benar dan terhubung ke Firebase

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses pemindahan data
    if (isset($_POST['id'])) {
        $id_order = $_POST['id'];
        try {
            // Ambil data dari tabel Order berdasarkan ID
            $orderData = $database->getReference("Order/{$id_order}")->getValue();

            if ($orderData) {
                // Pindahkan data ke tabel Selesai
                $storeData = $database->getReference("Selesai")->push($orderData);

                if ($storeData) {
                    // Hapus data dari tabel Order
                    $deleteData = $database->getReference("Order/{$id_order}")->remove();

                    if ($deleteData) {
                        $_SESSION['notif'] = 'Data berhasil dipindahkan ke tabel Selesai dan dihapus dari Order';
                    } else {
                        $_SESSION['notif'] = 'Data berhasil dipindahkan, tetapi gagal dihapus dari tabel Order';
                    }
                } else {
                    $_SESSION['notif'] = 'Gagal memindahkan data ke tabel Selesai';
                }
            } else {
                $_SESSION['notif'] = 'Data tidak ditemukan di tabel Order';
            }
        } catch (Exception $e) {
            $_SESSION['notif'] = 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }

    // Proses penghapusan data
    if (isset($_POST['delete_key'])) {
        $key = $_POST['delete_key'];
        try {
            // Hapus data dari tabel Order berdasarkan key
            $deleteData = $database->getReference("Order/{$key}")->remove();
            
            if ($deleteData) {
                $_SESSION['notif'] = 'Data berhasil dihapus';
            } else {
                $_SESSION['notif'] = 'Gagal menghapus data';
            }
        } catch (Exception $e) {
            $_SESSION['notif'] = 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }
}

// Redirect ke halaman utama setelah proses selesai
header('Location: data-order.php');
exit();
?>
