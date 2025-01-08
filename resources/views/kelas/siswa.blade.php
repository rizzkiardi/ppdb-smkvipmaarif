<!-- resources/views/kelas/siswa.blade.php -->
@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    <h1>Detail Siswa di Kelas</h1>

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Kelas</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Nomor Pendaftaran</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->calonSiswa->nama }}</td>
                    <td>{{ $siswa->calonSiswa->no_pendaftaran }}</td>
                    <td>{{ $siswa->calonSiswa->jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
