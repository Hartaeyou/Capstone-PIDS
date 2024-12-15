<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Daftar Rute</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Rute</th>
                <th>Jumlah Stasiun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rutes as $rute)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rute->nama_rute }}</td>
                    <td>{{ $rute->points->count() }}</td>
                    <td>
                        <a href="{{ route('rute.detail', ['id' => $rute->rute_id]) }} " class="btn btn-primary">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>