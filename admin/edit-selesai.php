<?php
session_start();
include('db.php'); // Pastikan file db.php benar dan terhubung ke Firebase

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses pemindahan data
    if (isset($_POST['id'])) {
        $id_Selesai = $_POST['id'];
        try {
            // Ambil data dari tabel Selesai berdasarkan ID
            $SelesaiData = $database->getReference("Selesai/{$id_Selesai}")->getValue();

            if ($SelesaiData) {
                // Pindahkan data ke tabel Riwayat
                $storeData = $database->getReference("Riwayat")->push($SelesaiData);

                if ($storeData) {
                    // Hapus data dari tabel Selesai
                    $deleteData = $database->getReference("Selesai/{$id_Selesai}")->remove();

                    if ($deleteData) {
                        $_SESSION['notif'] = 'Data berhasil dipindahkan ke tabel Riwayat dan dihapus dari Selesai';
                    } else {
                        $_SESSION['notif'] = 'Data berhasil dipindahkan, tetapi gagal dihapus dari tabel Selesai';
                    }
                } else {
                    $_SESSION['notif'] = 'Gagal memindahkan data ke tabel Riwayat';
                }
            } else {
                $_SESSION['notif'] = 'Data tidak ditemukan di tabel Selesai';
            }
        } catch (Exception $e) {
            $_SESSION['notif'] = 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }

    // Proses penghapusan data
    if (isset($_POST['delete_key'])) {
        $key = $_POST['delete_key'];
        try {
            // Hapus data dari tabel Selesai berdasarkan key
            $deleteData = $database->getReference("Selesai/{$key}")->remove();
            
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

// Redirect ke halaman utama setelah proses Riwayat
header('Location: data-Selesai.php');
exit();
?>
