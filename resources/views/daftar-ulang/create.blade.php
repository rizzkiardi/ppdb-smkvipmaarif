@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <a href="{{ route('daftar-ulang.index') }}" class="text-sm text-[#00AA5B] hover:underline">Kembali</a>
        <h2 class="mt-5 mb-2">Daftar Ulang</h2>
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <form action="{{ route('daftar-ulang.store') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto" >
                @csrf
                @if (Auth::user()->role == 'admin')
                    <div class="mb-3">
                        <label for="calon_siswa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa <span class="text-sm text-red-700">*</span></label>
                        <select name="calon_siswa_id" id="calon_siswa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option class="" value="">Pilih Siswa</option>
                            @foreach($calonSiswas as $calonSiswa)
                                <option class="" value="{{ $calonSiswa->id }}" >{{ $calonSiswa->nama }}</option>
                            @endforeach
                        </select>
                        @error('calon_siswa_id')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="bukti_pembayaran" id="upload-label" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-[#00AA5B]/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <span id="file-name" class="text-gray-500 mb-7">Unggah Bukti Pembayaran daftar ulang</span>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik </span> atau letakkan file disini</p>
                                <p class="text-xs text-gray-500">jpg, jpeg, png (maksimal. 1Mb)</p>
                            </div>
                            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="hidden" />
                            @error('bukti_pembayaran')
                                <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="text-sm italic">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>                    
                    </div> 
                    {{-- <button type="submit" class="w-full mx-auto mt-4 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Unggah</button> --}}
                    <button type="submit" class="w-full mx-auto mt-4 text-white bg-[#00AA5B] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Unggah</button>
                    @else 
                    <!-- Mengecek apakah pengguna sudah pernah daftar ulang -->
                    @php
                        // Get calonSiswa related to the logged-in user, or null if not registered
                        $calonSiswa = Auth::user()->calonSiswa;

                        // Check if calonSiswa exists and user has not already done daftar ulang
                        $daftarUlangExist = $calonSiswa ? \App\Models\DaftarUlang::where('calon_siswa_id', $calonSiswa->id)->exists() : false;
                    @endphp

                    @if ($calonSiswa)
                        <!-- Check if status is 'Diterima' and user has not done daftar ulang -->
                        @if ($calonSiswa->statusSiswa->status === 'Diterima' && !$daftarUlangExist)
                            <!-- Display user name and form for uploading payment proof -->
                            <div class="mb-3">
                                <label for="calon_siswa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                                <input type="text" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                                <input type="hidden" name="calon_siswa_id" value="{{ $calonSiswa->id }}">
                            </div>

                            <!-- Upload payment proof form -->
                            <div class="flex items-center justify-center w-full">
                                <label for="bukti_pembayaran" id="upload-label" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-[#00AA5B]/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <span id="file-name" class="text-gray-500 mb-7">Unggah Bukti Pembayaran daftar ulang</span>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik </span> atau letakkan file disini</p>
                                        <p class="text-xs text-gray-500">jpg, jpeg, png (maksimal. 1Mb)</p>
                                    </div>
                                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="hidden" />
                                    @error('bukti_pembayaran')
                                        <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                            <span class="text-sm italic">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </label>                    
                            </div> 

                            <button type="submit" class="w-full mx-auto mt-4 text-white bg-[#00AA5B] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Unggah</button>

                        @elseif ($daftarUlangExist)
                            <!-- If the user has already registered -->
                            <div class="py-2 px-4 my-10 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                Anda sudah melakukan daftar ulang. Terima kasih!
                            </div>
                        @else
                            <!-- If the user is not eligible for re-registration -->
                            <div class="py-2 px-4 my-10 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                Mohon maaf, hanya siswa dengan Status <strong>Diterima</strong> yang dapat melakukan Daftar Ulang.
                            </div>
                        @endif
                    @else
                        <!-- If the user has not yet registered as calon siswa -->
                        <div class="py-2 px-4 my-10 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            Anda belum terdaftar sebagai Calon Siswa. Silakan melakukan pendaftaran terlebih dahulu.
                        </div>
                    @endif

                @endif                
            </form>
        </div>
    </div>
@endsection
