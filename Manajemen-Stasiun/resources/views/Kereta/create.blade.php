<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kereta</title>
</head>
<body>
    <form action="{{ route('kereta.store') }}" method="post">
        @csrf
        <label for="nama_kereta">Nama Kereta</label>
        <input type="text" name="nama_kereta" id="nama_kereta" required>
        
        <label for="kode_kereta">Kode Kereta</label>
        <input type="text" name="kode_kereta" id="kode_kereta" required>
        
        <label for="rute_id">Pilih Rute</label>
        <select id="rute_id" name="rute_id" class="form-control" required>
            <option value="">Pilih Rute</option>
            @foreach ($rutes as $rute)
                <option value="{{ $rute->rute_id }}">{{ $rute->nama_rute }}</option>
            @endforeach
        </select>
        
        <button type="submit">Tambah Kereta</button>
    </form>
</body>
</html>
