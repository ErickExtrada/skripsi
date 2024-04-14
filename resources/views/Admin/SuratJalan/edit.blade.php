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
<form action='{{ url('surat-jalan/' . $suratJalan->id) }}' method='post'> <!-- Error -->
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('surat-jalan') }}" class="btn btn-secondary">
            << Back </a>
                <div class="mb-3 row">
                    <label for="name_client" class='col-sm-2 col-form-label'>Nama Client</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='name_client'
                            value="{{ $suratJalan->name_client }}" id="name_client">
                    </div>
                </div>
                <div class='mb-3 row'>
                    <label for="tracking" class='col-sm-2 col-form-label'>Tracking Pengiriman</label>
                    <div class="col-sm-10">
                        <select name="tracking" class="form-control input" id="tracking">
                            <option value="">Select </option>
                            @foreach ($pengirimanBarang as $tracking)
                                <option value="{{ $tracking->pengiriman_id }}">
                                    {{ $tracking->pengiriman_id . ' - ' . $tracking->items }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='date' id="date"
                            value="{{ date('Y-m-d', strtotime($suratJalan->date)) }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
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
