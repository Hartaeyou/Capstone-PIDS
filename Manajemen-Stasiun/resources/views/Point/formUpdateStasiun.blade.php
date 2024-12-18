<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <form action="{{ route('updateStasiun', ['id' => $updateForm->point_id]) }}" method="post">
        @csrf
        <label for="Name">Nama</label>
        <input type="text" name = "Name" id = "Name" value="{{ $updateForm->nama }}">

        <label for="Longitude">Longitude</label>
        <input type="text" name = "Longitude" id = "Longitude" value="{{ $updateForm->longitude }}">

        <label for="Latitude">Latitude</label>
        <input type="text" name = "Latitude" id = "Longitude" value="{{ $updateForm->latitude }}">

<!-- 
        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude">

        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude"> -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>