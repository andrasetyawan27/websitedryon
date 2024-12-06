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
          <h3 class="text-center">Form Tambah Blog</h3>
          <form action="Proses-order.php" method="POST">
            <div class="mb-3">
              <label for="title" class="form-label">Nama Pelanggan</label>
              <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
              <label for="layanan" class="form-label">Layanan</label>
              <select name="layanan" class="form-control" id="layanan">
                <option value="" disabled selected>Pilih Layanan</option>
                <option value="Reguler">Regular</option>
                <option value="Express">Express</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Jumlah</label>
              <input type="number" name="category" class="form-control" id="category" min="1">
            </div>
            <div class="mb-3">
              <label for="total" class="form-label">Total</label>
              <input type="text" class="form-control" id="total" name="total" readonly>
            </div>
            <a href="index.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
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
  $(document).ready(function () {
    // Hitung total otomatis
    $('#layanan, #category').on('input change', function () {
      const layanan = $('#layanan').val(); // Mengambil nilai layanan
      const jumlah = parseInt($('#category').val()) || 0; // Mengambil jumlah, default 0 jika kosong
      let harga = 0;

      // Tentukan harga berdasarkan layanan
      if (layanan === 'Reguler') {
        harga = 7000; // Harga untuk Regular
      } else if (layanan === 'Express') {
        harga = 10000; // Harga untuk Express
      }

      // Hitung total
      const total = harga * jumlah;

      // Format ke Rupiah dan tampilkan di input total
      $('#total').val(total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
    });
  });
</script>
</body>

</html>
