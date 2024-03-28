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
<form action='{{ url('admintruck/') . $truck->id }}' method='post'> <!-- Error -->
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('admintruck') }}" class="btn btn-secondary">
            << Back </a>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Jenis Truck</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jenistruck' value="{{ Session::get('jenistruck') }}"
                        id="jenis_truck">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nomor Polisi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nomorpolisi'
                        value="{{ Session::get('nomorpolisi') }}" id="nomor_polisi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Tahun Kendaraan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='tahunkendaraan' value="{{ Session::get('tahunkendaraan') }}" 
                    id="tahun_kendaraan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Operator</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='operator' value="{{ Session::get('operator') }}"
                        id="operator">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </div>
</form>

<body class="bg-light">
    <main class="container">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
