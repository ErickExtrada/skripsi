<!doctype html>
<html lang="en">

<head>
    <title>PT WINEX WAREHOUSE MANAGAMENT SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5"><img src="{{ asset('images/img1.png') }}"
                        alt=""></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{ url('pengelola-gudang') }}" aria-expanded="false" class="">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('pengelolainput') }}">Transaksi</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('') }}" aria-expanded="false" class="">Barang Keluar</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{ url('surat-jalan') }}">Surat Jalan</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('') }}">Pengiriman Barang</a>
                    </li> --}}
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
                    <main class="container">
                        @if (Session::has('success'))
                            <div class="pt-3">
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                        @elseif (Session::has('warning'))
                            <div class="pt-3">
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }}
                                </div>
                            </div>
                        @endif
                    </main>
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
            <form class="d-flex" action="{{ url('pengelolainput') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Id Barang</th>
                        <th class="col-md-1">Kategori Barang</th>
                        <th class="col-md-1">Nama Barang</th>
                        <th class="col-md-2">Quantity</th>
                        <th class="col-md-2">Keterangan</th>
                        <th class="col-md-1">Harga</th>
                        <th class="col-md-1">Date</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstItem(); ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->kategori_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a href='{{ url('pengelolainput/' . $item->id . '/edit') }}'
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Delete data ini ?')" class='d-inline'
                                    action="{{ url('pengelolainput/' . $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>

    </div>
    </div>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
