<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Detail Rute: {{ $rute->nama_rute }}</h1>

        <h3>Point (Stasiun) dalam Rute</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Nama Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rute->points as $point)
                    <tr>
                        <td>{{ $point->pivot->sequence }}</td>
                        <td>{{ $point->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Kereta pada Rute Ini</h3>
        <a href="{{ route('rute.index') }}" class="btn btn-secondary">Kembali ke Daftar Rute</a>
        <a href="{{ route('rute.editPage', ['id' => $rute->rute_id]) }}">Edit</a>
        <a href="">Hapus Rute</a>
    </div>
</body>
</html>