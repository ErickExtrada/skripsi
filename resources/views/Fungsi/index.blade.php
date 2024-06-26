<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Input Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Id Barang</th>
                            <th class="col-md-2">NamaBarang</th>
                            <th class="col-md-2">KategoriBarang</th>
                            <th class="col-md-3">Quantity</th>
                            <th class="col-md-3">Keterangan</th>
                            <th class="col-md-4">Harga</th>
                            <th class="col-md-4">Date</th>
                            <th class="col-md-4">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Galon Aqua 5L</td>
                            <td>Aqua</td>
                            <td>100</td>
                            <td>Stock dari gudang b</td>
                            <td>Rp22.000</td>
                            <td>1-1-2024</td>
                            <td>
                                <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
          </div>
          <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>