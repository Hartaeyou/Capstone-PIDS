@extends('layout.main')
@section('css')
    <link rel="stylesheet" href="{{ URL('css/stationInfo.css') }}">
@endsection
@section('content')

    <h1 style="font-weight : bold; font-size : 22px">Ubah Data Kereta {{ $kereta->nama_kereta }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('kereta.update', $kereta->kereta_id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_kereta" style="font-weight : bold;  font-size : 15px; color : #6C6C6C" class="form-label">Nama Kereta</label>
                    <input type="text" class="form-control" name="nama_kereta" id="nama_kereta" value="{{ $kereta->nama_kereta }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode_kereta" style="font-weight : bold;  font-size : 15px; color : #6C6C6C" class="form-label">Kode Kereta</label>
                    <input type="text" class="form-control" name="kode_kereta" id="kode_kereta" value="{{ $kereta->kode_kereta }}" required>
                </div>

                <div class="mb-3">
                    <label for="rute_id" style="font-weight : bold;  font-size : 15px; color : #6C6C6C" class="form-label">Pilih Rute</label>
                    <select class="form-select" aria-label="Default select example" name="rute_id" id="rute_id">
                        <option value="{{ $kereta->rute_id }}">{{$kereta->rute->nama_rute}}</option>
                        @foreach ($rutes as $rute)
                            <option value="{{ $rute->rute_id }}" {{ $kereta->rute_id == $rute->id ? 'selected' : '' }}>
                                {{ $rute->nama_rute }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class = "btn btn-md btn-orange" type="submit">Perbarui</button>
            </form>
        </div>

        <div class="col-md-4">
            <h4 class="text-center">Stasiun Pemberhentian Saat Ini</h4>

            <div class="station-timeline">
                <div class="d-flex justify-content-center align-items-center">
                @if ($kereta->rute && $kereta->rute->points->count())
                    <ul class="timeline">
                    @foreach ($kereta->rute->points as $point)
                    <li class="timeline-item active ">
                        <div class="circle">{{ $point->pivot->sequence }}</div>
                        <div class="station-name fw-bold"><span class="fw-bold">{{ $point->nama }}</span></div>
                    </li>
                    @endforeach
                    </ul>
                @else
                <p>Tidak ada point untuk rute ini.</p>
                @endif
                </div>
            </div>
        </div>
    </div>



@endsection

