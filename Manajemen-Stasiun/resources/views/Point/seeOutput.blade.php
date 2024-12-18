<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="border: 1px solid black">
        <tr>
            <th>Nama</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Aksi</th>
        </tr>
        @foreach ($points as $point)
        <tr>
            <td>{{ $point->nama }}</td>
            <td>{{ $point->latitude }}</td>
            <td>{{ $point->longitude }}</td>
            <td>
                <form action="{{ route('deleteStasiun', ['id' => $point->point_id]) }}" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('formUpdateStasiun', ['id' => $point->point_id]) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>