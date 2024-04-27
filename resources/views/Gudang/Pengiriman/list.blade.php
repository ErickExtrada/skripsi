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

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5"><img src="{{ asset('images/img1.png') }}"
                        alt=""></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="" aria-expanded="false" class="">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('barang') }}">Daftar Barang</a>
                    </li>
                    <li>
                        <a href="{{ url('pengiriman') }}">Pengiriman Barang</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('surat-jalan') }}">Surat Jalan</a>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Id</th>
                        <th class="col-md-1">Id Transaksi</th>
                        <th class="col-md-1">Alamat Pickup</th>
                        <th class="col-md-1">Alamat Destinasi</th>
                        <th class="col-md-1">Date</th>
                        <th class="col-md-1">Status</th>
                        <th class="col-md-1">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstItem(); ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->id_data_transaksi }}</td>
                            <td>{{ $item->pickup_address }}</td>
                            <td>{{ $item->destination_address }}</td>
                            <td>{{ date('Y-m-d', strtotime($item->date)) }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href='{{ url('pengiriman/' . $item->id . '/edit') }}'
                                    class="btn btn-warning btn-sm">Edit</a>
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
</body>

</html>
