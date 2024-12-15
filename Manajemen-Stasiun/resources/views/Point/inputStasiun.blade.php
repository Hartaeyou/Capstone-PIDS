<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('inputStasiun') }}" method="post">
        @csrf
        <label for="Name">Nama</label>
        <input type="text" name = "Name" id = "Name">

        <label for="Longitude">Longitude</label>
        <input type="text" name = "Longitude" id = "Longitude">

        <label for="Latitude">Latitude</label>
        <input type="text" name = "Latitude" id = "Longitude">

<!-- 
        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude">

        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude"> -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>