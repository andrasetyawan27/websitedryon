<?php
session_start();
include('db.php');

// Ambil data dari formulir POST
$nama_pelanggan = $_POST['title']; // Nama pelanggan
$layanan = $_POST['layanan'];        // Layanan (Regular/Express)
$jumlah = (int)$_POST['category']; // Jumlah layanan
$total = $_POST['total'];

// Tentukan waktu saat data disimpan
$waktu_simpan = date("d-m-Y H:i:s"); // Format: YYYY-MM-DD HH:MM:SS

// Susun data order ke dalam array
$orderData = [
    'namaPelanggan' => $nama_pelanggan,
    'layanan' => $layanan,
    'jumlah' => $jumlah,
    'total' => $total,
    'Tanggal' => $waktu_simpan, // Tambahkan waktu penyimpanan
];

// Tentukan tabel dalam Firebase Realtime Database
$table = "Order";

// Simpan data baru ke dalam Firebase Realtime Database
$storeData = $database->getReference($table)->push($orderData);

// Periksa apakah penyimpanan data berhasil atau tidak
if ($storeData) {
    // Jika berhasil, atur notifikasi dan arahkan kembali ke halaman utama
    $_SESSION['notif'] = 'Order berhasil ditambahkan';
    header('Location: data-order.php');
} else {
    // Jika gagal, atur notifikasi dan arahkan kembali ke halaman utama
    $_SESSION['notif'] = 'Order gagal ditambahkan';
    header('Location: data-order.php');
}
