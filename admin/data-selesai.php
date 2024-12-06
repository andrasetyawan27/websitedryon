<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="src/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <?php include "menu-kiri.php"; ?>
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
        
      <?php include "menu-atas.php"; ?>
    <div class="container-fluid">
    <div class="container mb-3">
    <h3 class="text-center">Data Blog</h3>
        <a href="tambah-selesai.php"><button type="button" class="btn btn-primary mb-3">Tambah Blog</button></a>
        <?php
        if (isset($_SESSION['notif'])) {
            echo "<div class='alert alert-primary mt-3' role='alert'>" . $_SESSION['notif'] . "</div>";
            unset($_SESSION['notif']);
        }
        ?>

        <!-- Tambahkan ID pada tabel untuk inisialisasi DataTables -->
        <table class="table" id="blogTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include('db.php');

                $table = "Selesai";
                $data = $database->getReference($table)->getValue();

                if ($data > 0) {
                    $i = 1;
                    foreach ($data as $key => $value) {
                ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $value['namaPelanggan']; ?></td>
                            <td><?= $value['layanan']; ?></td>
                            <td><?= $value['jumlah']; ?></td>
                            <td><?= $value['total']; ?></td>
                            <td><?= $value['Tanggal']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol Proses -->
                                    <form action="edit-selesai.php" method="POST" class="me-2">
                                        <input type="hidden" name="id" value="<?= $key; ?>">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Proses</button>
                                    </form>
                                    
                                    <!-- Tombol Delete -->
                                    <form action="hapus-selesai.php" method="POST">
                                        <button type="submit" name="delete_key" value="<?= $key; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
  </div>
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="src/assets/js/sidebarmenu.js"></script>
    <script src="src/assets/js/app.min.js"></script>
    <script src="src/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#selesaiTable').DataTable(); // Inisialisasi DataTables pada tabel
        });
    </script>
</body>

</html>