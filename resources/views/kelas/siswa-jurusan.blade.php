@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <a href="{{ route('kelas') }}" class="text-sm text-[#00AA5B] hover:underline">Kembali</a>
        <h2 class="text-md mt-5 mb-2">Daftar Siswa di Kelas {{ $kelas->nama_kelas }} - {{ $kelas->jurusan }}</h2>
        <div class=" overflow-x-auto shadow-md sm:rounded-lg ">
            <table id="calosiswa-table" data-tab-for="order" data-page="active" class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">No</th>
                        <th scope="col" class="px-2 py-3">NISN</th>
                        <th scope="col" class="px-2 py-3">Nama Siswa</th>
                        <th scope="col" class="px-2 py-3">Tempat, Tgl Lahir</th>
                        <th scope="col" class="px-2 py-3">Jenis Kelamin</th>
                    </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($siswaList as $index => $siswa)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-2 py-4">{{ $index + 1 }}</td>
                    <td class="px-2 py-4">{{ $siswa->calonSiswa->nisn }}</td>
                    <td class="px-2 py-4">{{ $siswa->calonSiswa->nama }}</td>
                    <td class="px-2 py-4">
                        <span class="text-sm">{{ $siswa->calonSiswa->tempat_lahir }},  {{ Carbon\Carbon::parse($siswa->calonSiswa->tgl_lahir)->translatedFormat('d F Y')}}</span>                          
                    </td>
                    <td class="px-2 py-4">{{ $siswa->calonSiswa->j_kelamin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

