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
    <h3 class="text-center">Data Laundry</h3>
        <a href="tambah-order.php"><button type="button" class="btn btn-primary mb-3">Tambah Blog</button></a>
        <?php
        if (isset($_SESSION['notif'])) {
            echo "<div class='alert alert-primary mt-3' role='alert'>" . $_SESSION['notif'] . "</div>";
            unset($_SESSION['notif']);
        }?>

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

                $table = "Order";
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
                          <!-- Tombol Detail -->
                          <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#detailModal" 
                          data-nama="<?= $value['namaPelanggan']; ?>" 
                          data-layanan="<?= $value['layanan']; ?>" 
                          data-jumlah="<?= $value['jumlah']; ?>" 
                          data-total="<?= $value['total']; ?>" 
                          data-tanggal="<?= $value['Tanggal']; ?>">
                            <i class="fas fa-info-circle"></i> Detail
                          </button>

                          <!-- Tombol Selesai -->
                          <form action="edit-order.php" method="POST" class="me-2">
                            <input type="hidden" name="id" value="<?= $key; ?>">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Selesai</button>
                          </form>

                          <!-- Tombol Delete -->
                          <form action="hapus-order.php" method="POST">
                            <button type="submit" name="delete_key" value="<?= $key; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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
<!-- Modal Detail -->
 <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow border-0 rounded-4 overflow-hidden">
      <!-- Header -->
      <div class="modal-header bg-gradient-primary text-white py-4">
        <h5 class="modal-title fw-bold d-flex align-items-center" id="detailModalLabel">
          <i class="fas fa-info-circle me-2"></i> Detail Order
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body p-4">
        <div class="row g-3">
          <div class="col-md-12 text-center">
            <i class="fas fa-box-open fa-3x text-primary mb-3"></i>
          </div>
          <div class="col-md-12">
            <!-- Tampilkan informasi secara vertikal, satu per baris -->
            <p><strong>Nama:</strong> <span id="modalNama" class="text-dark fw-semibold"></span></p>
            <p><strong>Layanan:</strong> <span id="modalLayanan" class="text-dark fw-semibold"></span></p>
            <p><strong>Jumlah:</strong> <span id="modalJumlah" class="text-dark fw-semibold"></span></p>
            <p><strong>Total:</strong> <span id="modalTotal" class="text-success fw-bold"></span></p>
            <p><strong>Tanggal:</strong> <span id="modalTanggal" class="text-dark fw-semibold"></span></p>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer bg-light d-flex justify-content-between">
        <button type="button" class="btn btn-secondary rounded-pill px-4 py-2" data-bs-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
        <button type="button" class="btn btn-primary rounded-pill px-4 py-2" onclick="printModal()">
          <i class="fas fa-print"></i> Cetak
        </button>
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
        $('#blogTable').DataTable();

        // Event untuk tombol detail
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            $('#modalNama').text(button.data('nama'));
            $('#modalLayanan').text(button.data('layanan'));
            $('#modalJumlah').text(button.data('jumlah'));
            $('#modalTotal').text(button.data('total'));
            $('#modalTanggal').text(button.data('tanggal'));
        });
    });

    function printModal() {
  var printContent = document.querySelector('#detailModal .modal-body').innerHTML;
  var originalContent = document.body.innerHTML;
  
  // Set the content for printing
  document.body.innerHTML = `<div class="modal-content"><div class="modal-body">${printContent}</div></div>`;
  
  window.print();
  
  // Restore original content after printing
  document.body.innerHTML = originalContent;
}

  </script>
</body>

</html>