<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<form action='{{ url('admin-pengiriman/' . $data->id) }}' method='post'> <!-- Error -->
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('admin-pengiriman') }}" class="btn btn-secondary">
            << Back </a>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Items</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='items' value="{{ $data->items }}"
                            id="items">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Kategori Operator</label>
                    <div class="col-sm-10">
                        <select name="kategori_operator" id="kategori" class="form-control input">
                            <option value="{{ $data->operator }}">{{ $truck->operator }}</option>
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->id_operator }}">{{ $truck->operator }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control input" id="status">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            @foreach ($listStatus as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='harga' value="{{ $data->total_harga }}"
                            id="harga">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Alamat Pickup</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='pickup_address'
                            value="{{ $data->pickup_address }}" id="pickup_address">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Alamat Pengiriman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='destination_address'
                            value="{{ $data->destination_address }}" id="destination_address">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='date' id="date"
                            value="{{ date('Y-m-d', strtotime($data->date)) }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
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
        })
    </script>

    <script>
        function formatNumberWithComma(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $(document).ready(function() {
            $('#harga').on('change', function() {
                const harga = $(this).val();
                $('#harga').val(formatNumberWithComma(harga));
            })
        });
    </script>
</body>

</html>
