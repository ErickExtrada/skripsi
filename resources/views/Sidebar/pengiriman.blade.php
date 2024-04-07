<!doctype html>
<html lang="en">

<head>
    <title>PT WINEX WAREHOUSE MANAGAMENT SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>

<body class="bg-light">
    <main class="container">
        @include('komponen.pesan')
    </main>
</body>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5"><img src="{{ asset('images/img1.png') }}"
                        alt=""></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{ url('') }}" aria-expanded="false" class="">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('pengelolainput') }}">Input Barang</a>
                    </li>
                    <li>
                        <a href="{{ url('') }}" aria-expanded="false" class="">Barang Keluar</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('') }}">Surat Jalan</a>
                    </li>
                    <li>
                        <a href="{{ url('') }}">Pengiriman Barang</a>
                    </li>
                    <li>
                        <a href=""></a>
                    </li>
                    <li>
                        <a href="/logout">Log Out</a>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </nav>
            <div class="pb-3">
                <a href='{{ url('/createData') }}' class="btn btn-primary">Input Data</a>
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
                        <th class="col-md-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>1</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kategori_barang }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
</body>

</html>
