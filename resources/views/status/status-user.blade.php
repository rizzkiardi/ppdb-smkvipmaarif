@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <a href="{{ route('dashboard') }}" class="text-sm text-[#00AA5B] hover:underline">Kembali</a>
        <h2 class="mb-2">Status peserta Didik Baru SMK VIP Maarif NU 1 Kemiri</h2>
        <div class="overflow-x-auto shadow-md sm:rounded-lg ">
            <table data-tab-for="order" data-page="diterima" class=" w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Tempat/Tgl Lahir
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Asal Sekolah
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Jurusan
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Status
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @php $calonSiswaLogin = $calonsiswas->where('user_id', Auth::user()->id); @endphp
                
                    @if ($calonSiswaLogin->isEmpty())
                        <!-- Jika user belum melakukan pendaftaran -->
                        <tr>
                            <td colspan="7" class="text-center py-10">
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Status Anda belum tersedia. Silahkan mendaftar terlebih dahulu.</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($calonSiswaLogin as $calonsiswa)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $calonsiswa->nama }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $calonsiswa->j_kelamin }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $calonsiswa->tempat_lahir }},  {{ Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d F Y')}}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $calonsiswa->sekolah_asal }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    @if ($calonsiswa->statussiswa)
                                        @if ($calonsiswa->statussiswa->status == 'Diproses')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @else
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @endif
                                    @else
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Status belum tersedia.</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection