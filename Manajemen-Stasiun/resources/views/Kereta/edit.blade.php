<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kereta</title>
</head>
<body>
    <form action="{{ route('kereta.update', $kereta->kereta_id) }}" method="post">
        @csrf
        <label for="nama_kereta">Nama Kereta</label>
        <input type="text" name="nama_kereta" id="nama_kereta" value="{{ $kereta->nama_kereta }}" required>
        
        <label for="kode_kereta">Kode Kereta</label>
        <input type="text" name="kode_kereta" id="kode_kereta" value="{{ $kereta->kode_kereta }}" required>
        
        <label for="rute_id">Pilih Rute</label>
        <select name="rute_id" id="rute_id">
            <option value="{{ $kereta->rute_id }}">{{$kereta->rute->nama_rute}}</option>
            @foreach ($rutes as $rute)
                <option value="{{ $rute->rute_id }}" {{ $kereta->rute_id == $rute->id ? 'selected' : '' }}>
                    {{ $rute->nama_rute }}
                </option>
            @endforeach
        </select>

        <h3>Point dalam Rute</h3>
        <p>Kereta ini berada di rute {{ $kereta->rute->nama_rute }}</p>
        @if ($kereta->rute && $kereta->rute->points->count())
            <ul>
                @foreach ($kereta->rute->points as $point)
                    <li>{{ $point->nama }} (Urutan: {{ $point->pivot->sequence }})</li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada point untuk rute ini.</p>
        @endif

        <button type="submit">Perbarui</button>
    </form>
</body>
</html>
