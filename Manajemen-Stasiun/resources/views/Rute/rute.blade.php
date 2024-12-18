@extends('layout.main')
@section('content')

<style>
    /* Tabel Utama */
    #ruteTable {
        border-spacing: 0 20px;
        border-collapse: separate;
        width: 100%;
    }

    #ruteTable thead th {
        padding: 15px 10px;
        text-align: center;
        border: none;
        background-color: #F0F0F0 !important;
        color: #ACACAC !important;
        font-size: 15px;
    }

    #ruteTable tbody tr {
        height: 85px;
        background-color: #000000;
    }

    #ruteTable td {
        padding: 15px 10px;
        text-align: center;
        vertical-align: middle;
        color: black;
        font-size: 17px;
    }

    /* Styling Pagination */
    .page-link {
        color: #000000 !important;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .page-link:hover {
        color: #ffffff !important;
        background-color: #EE6B23;
        border-color: #EE6B23;
    }

    .page-item.active .page-link {
        color: #ffffff !important;
        background-color: #EE6B23;
        border-color: #EE6B23;
        font-weight: bold;
    }


</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h3>Daftar Rute</h3>
            <hr>
        </div>
        <div class="col-md-2">
            <a href="{{ route('formCreateRute') }}" class="btn btn-orange btn-md" style="margin-top: 20px;">Tambah Rute</a>
        </div>
    </div>

    <!-- Table -->
    <table id="ruteTable" class="table">
        <thead>
            <tr>
                <th>No</th>
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
                    @include('Rute.Components.modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
        {{ $rutes->links() }}
    </div>
</div>

<!-- Bootstrap JS dan Popper.js -->

@endsection
