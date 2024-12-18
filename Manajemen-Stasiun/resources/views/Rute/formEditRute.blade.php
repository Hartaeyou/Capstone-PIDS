<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rute</title>
    <style>
        .move-buttons {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Rute: {{ $rute->nama_rute }}</h1>

    <div class="mb-3">
        <label for="nama_rute" class="form-label">Nama Rute</label>
        <input type="text" class="form-control" id="nama_rute" name="nama_rute" value="{{ $rute->nama_rute }}">
    </div>

    <h3>Point (Stasiun) dalam Rute</h3>
    <table class="table table-bordered" id="points-table">
        <thead>
            <tr>
                <th>Nama Point</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rute->points as $point)
                <tr data-index="{{ $loop->index }}" data-id="{{ $point->point_id }}">
                    <td>{{ $point->nama }}</td>
                    <td>
                        <input type="hidden" class="form-control sequence-input" value="{{ $point->pivot->sequence }}" readonly>
                    </td>
                    <td>
                        <div class="move-buttons">
                        <button type="button" class="btn btn-secondary move-up">Naik</button>
                        <button type="button" class="btn btn-secondary move-down">Turun</button>
                        <button type="button" class="btn btn-danger delete-point">Hapus</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-3">
        <label for="new_point" class="form-label">Tambah Stasiun</label>
        <select id="new_point" class="form-control">
            <option value="">Pilih Stasiun</option>
            @foreach ($availablePoints as $point)
                <option value="{{ $point->point_id }}">{{ $point->nama }}</option>
            @endforeach
        </select>
        <button type="button" id="add-point" class="btn btn-secondary mt-2">Tambah Stasiun</button>
    </div>

    <button id="save-button" class="btn btn-primary">Simpan</button>
    <a href="{{ route('rute.index') }}" class="btn btn-secondary">Batal</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tableBody = document.querySelector('#points-table tbody');
        const saveButton = document.getElementById('save-button');
        const namaRuteInput = document.getElementById('nama_rute');
        const newPointSelect = document.getElementById('new_point');
        const addPointButton = document.getElementById('add-point');

        // Fungsi untuk memperbarui urutan
        function updateSequence() {
            const rows = tableBody.querySelectorAll('tr');
            rows.forEach((row, index) => {
                const sequenceInput = row.querySelector('.sequence-input');
                sequenceInput.value = index + 1; // Perbarui urutan sesuai posisi
            });
        }

        // Tambah stasiun baru ke tabel
        addPointButton.addEventListener('click', () => {
            const selectedPointId = newPointSelect.value;
            const selectedPointName = newPointSelect.options[newPointSelect.selectedIndex].text;

            if (!selectedPointId) {
                alert('Pilih stasiun terlebih dahulu!');
                return;
            }

            // Tambahkan baris baru ke tabel
            const newRow = document.createElement('tr');
            newRow.setAttribute('data-id', selectedPointId);
            newRow.innerHTML = `
                <td>${selectedPointName}</td>
                <td><input type="hidden" class="form-control sequence-input" value="" readonly></td>
                <td>
                    <div class="move-buttons">
                        <button type="button" class="btn btn-secondary move-up">Naik</button>
                        <button type="button" class="btn btn-secondary move-down">Turun</button>
                        <button type="button" class="btn btn-danger delete-point">Hapus</button>
                    </div>
                </td>
            `;
            tableBody.appendChild(newRow);

            // Perbarui urutan
            updateSequence();

            // Hapus stasiun dari dropdown
            newPointSelect.querySelector(`option[value="${selectedPointId}"]`).remove();
        });

        // Fungsi untuk menukar urutan
        function swapRows(row1, row2) {
            const sibling = row2.nextSibling;
            tableBody.insertBefore(row2, row1);
            tableBody.insertBefore(row1, sibling);
            updateSequence();
        }

        // Event listener tombol Naik
        tableBody.addEventListener('click', (e) => {
            if (e.target.classList.contains('move-up')) {
                const row = e.target.closest('tr');
                const previousRow = row.previousElementSibling;
                if (previousRow) {
                    swapRows(previousRow, row);
                }
            }
        });

        // Event listener tombol Turun
        tableBody.addEventListener('click', (e) => {
            if (e.target.classList.contains('move-down')) {
                const row = e.target.closest('tr');
                const nextRow = row.nextElementSibling;
                if (nextRow) {
                    swapRows(row, nextRow);
                }
            }
        });

        // Event listener tombol Hapus
        tableBody.addEventListener('click', (e) => {
            if (e.target.classList.contains('delete-point')) {
                const row = e.target.closest('tr');
                const pointId = row.getAttribute('data-id');

                // Tambahkan kembali ke dropdown
                const pointName = row.querySelector('td:first-child').textContent;
                const option = document.createElement('option');
                option.value = pointId;
                option.textContent = pointName;
                newPointSelect.appendChild(option);

                // Hapus baris
                row.remove();

                // Perbarui urutan
                updateSequence();
            }
        });

        // Event listener untuk tombol Simpan
        saveButton.addEventListener('click', async () => {
            const rows = tableBody.querySelectorAll('tr');
            const points = [];
            rows.forEach((row) => {
                const pointId = row.getAttribute('data-id');
                const sequence = row.querySelector('.sequence-input').value;
                points.push({ id: pointId, sequence });
            });

            // Data yang akan dikirim
            const data = {
                nama_rute: namaRuteInput.value,
                points: points
            };

            try {
                // Kirim data ke backend menggunakan Fetch API
                const response = await fetch("{{ route('rute.update', $rute->rute_id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify(data),
                });

                if (response.ok) {
                    alert('Rute berhasil diperbarui!');
                    window.location.href = "{{ route('rute.index') }}"; // Redirect setelah berhasil
                } else {
                    const errorData = await response.json();
                    alert('Terjadi kesalahan: ' + (errorData.message || 'Silakan coba lagi.'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });

</script>


</body>
</html>
