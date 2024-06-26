<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PT WINEX WAREHOUSE MANGAMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- START FORM -->
<form action='{{ url('adminpengiriman') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('adminpengiriman') }}" class="btn btn-secondary">
            << Back </a>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Kategori Barang</label>
                    <div class="col-sm-10">
                        <select name="kategori_barang" id="kategori" class="form-control input">
                            <option value="">Select Category</option>
                            @foreach ($kategori as $category)
                                <option value="{{ $category->kode_barang }}">{{ $category->kategori_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <select name="nama_barang" id="nama_barang" class="form-control input">
                            <option value="">Select Product</option>
                            {{-- Options will be populated based on category selection --}}
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='quantity'
                            value="{{ Session::get('quantity') }}" id="quantity">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='keterangan' id="keterangan">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='harga' value="{{ Session::get('harga') }}"
                            id="harga">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='date' id="date">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
                {{ csrf_field() }}
    </div>
</form>

<body class="bg-light">
    <main class="container">
        @yield('content')
    </main>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var date = new Date();
            var today = date.toISOString().split('T')[0]; // Mendapatkan tanggal hari ini
            date.setDate(date.getDate() - 1);
            var inputTanggalPemesanan = document.getElementById('date');
            inputTanggalPemesanan.setAttribute('min', today); // Set tanggal minimum adalah kemarin
        });
    </script>
    {{-- ERROR --}}
    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                var kode_barang = $(this).val();
                if (kode_barang) {
                    $.ajax({
                        url: '/products/' + kode_barang,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#nama_barang').empty().append(
                                '<option value="">Select Product</option>');
                            $.each(data, function(i, Barang) {
                                $('#nama_barang').append($('<option>', {
                                    value: Barang.id,
                                    text: Barang.nama_barang
                                }));
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            var errorMsg = 'Error loading products';
                            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                                errorMsg += ': ' + jqXHR.responseJSON.error;
                            }
                            $('#nama_barang').empty().append('<option value="">' + errorMsg +
                                '</option>');
                            console.error("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                } else {
                    $('#nama_barang').empty().append('<option value="">Select Category First</option>');
                }
            });
        });
    </script>


</body>

</html>
