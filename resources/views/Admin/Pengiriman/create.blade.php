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
<form action='{{ url('admin-pengiriman/') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('admin-pengiriman') }}" class="btn btn-secondary">
            << Back </a>
                <div class='mb-3 row'>
                    <label for="items" class='col-sm-2 col-form-label'>Items</label>
                    <div class="col-sm-10">
                        <select name="items" class="form-control input" id="items">
                            <option value="">Select Item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->nama_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Kategori Operator</label>
                    <div class="col-sm-10">
                        <select name="kategori_operator" id="kategori" class="form-control input">
                            <option value="">Select Operator</option>
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->operator_id }}">{{ $truck->operator }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control input" id="status">
                            <option value="">Select Status</option>
                            @foreach ($listStatus as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='harga' value="{{ Session::get('harga') }}"
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
        function formatNumberWithComma(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                const kode_barang = $(this).val();
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
                                    value: Barang.nama_barang,
                                    text: Barang.nama_barang,
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

            $('#harga').on('change', function() {
                const harga = $(this).val();
                $('#harga').val(formatNumberWithComma(harga));
            })
        });
    </script>


</body>

</html>
