<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Bukti Pendaftaran</title>
</head>
<body>
    <a href="{{ route('bukti-pendaftaran.cetak') }}">Download pdf</a>
    @foreach ($calonsiswas as $calonsiswa)
    <ul>
        <li>{{ $calonsiswa->nama }}</li>
    </ul>  
    @endforeach
</body>
</html>