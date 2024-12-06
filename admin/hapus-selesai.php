<?php
session_start();
include('db.php');

// Periksa apakah ID diterima dari form
if (isset($_POST['delete_key'])) {
    $id = $_POST['delete_key'];

    // Referensi ke data di tabel Order
    $orderRef = $database->getReference("Selesai/$id");

    // Hapus data dari Firebase
    $deleteData = $orderRef->remove();

    if ($deleteData) {
        $_SESSION['notif'] = 'Data berhasil dihapus.';
    } else {
        $_SESSION['notif'] = 'Data gagal dihapus.';
    }
} else {
    $_SESSION['notif'] = 'ID tidak valid.';
}

// Kembali ke halaman data-order.php
header('Location: data-selesai.php');
exit();
?>
