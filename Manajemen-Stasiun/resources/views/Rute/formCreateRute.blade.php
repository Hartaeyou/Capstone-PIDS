<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Buat Rute Baru</h1>

    <!-- Input untuk Nama Rute -->
    <div class="mb-3">
        <label for="nama_rute" class="form-label">Nama Rute</label>
        <input type="text" class="form-control" id="nama_rute" name="nama_rute">
    </div>

    <!-- Daftar Point -->
    <h3>Point (Stasiun)</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Point</th>
                <th>Urutan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($points as $point)
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input point-checkbox" id="point_{{ $point->point_id }}" value="{{ $point->point_id }}">
                            <label class="form-check-label" for="point_{{ $point->point_id }}">{{ $point->nama }}</label>
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control point-sequence" id="sequence_{{ $point->point_id }}" min="1" max="{{ $points->count() }}" value="{{ $loop->index + 1 }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button id="submit-button" class="btn btn-primary">Simpan</button>
    <a href="{{ route('rute.index') }}" class="btn btn-secondary">Batal</a>
</div>

<!-- Tambahkan JavaScript di bawah -->
<script>
    document.getElementById('submit-button').addEventListener('click', async function (e) {
        e.preventDefault(); // Mencegah default action tombol

        // Ambil nama rute
        const namaRute = document.getElementById('nama_rute').value;

        // Ambil semua checkbox point dan sequence yang sesuai
        const checkboxes = document.querySelectorAll('.point-checkbox');
        const selectedPoints = [];

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const sequenceInput = document.getElementById(`sequence_${checkbox.value}`);
                selectedPoints.push({
                    point_id: checkbox.value,
                    sequence: sequenceInput.value
                });
            }
        });

        // Validasi minimal 2 point dicentang
        if (selectedPoints.length < 2) {
            alert('Harap pilih minimal 2 point untuk membuat rute.');
            return;
        }

        // Validasi duplikasi urutan
        const sequences = selectedPoints.map(point => point.sequence);
        const uniqueSequences = new Set(sequences);
        if (sequences.length !== uniqueSequences.size) {
            alert('Tidak boleh ada urutan yang sama pada point yang dipilih.');
            return;
        }

        // Buat objek data untuk dikirim
        const data = {
            nama_rute: namaRute,
            points: selectedPoints
        };

        try {
            // Kirim data menggunakan Fetch API
            const response = await fetch("{{ route('rute.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // Laravel CSRF token
                },
                body: JSON.stringify(data) // Konversi data ke JSON
            });

            if (response.ok) {
                alert('Rute berhasil dibuat!');
                window.location.href = "{{ route('rute.index') }}";
            } else {
                const errorData = await response.json();
                alert('Terjadi kesalahan: ' + (errorData.message || 'Silakan coba lagi.'));
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
</script>

</body>
</html>
