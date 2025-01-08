@extends('layouts.app')

@section('content')
    <x-breadcrumb :breadcrumbs="$breadcrumbs" />

    <!-- Content for Orangtua -->
    <div class="px-6">
        <div class="mb-6 bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <p class="text-lg mb-1">Selanjutnya isi formulir Orangtua.</p>
            <p class="text-xs italic mb-4">*pastikan mengisi formulir dengan lengkap dan benar. </p>

            <form action="{{ route('pendaftaran.orangtua.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto grid gap-10 sm:grid-cols-1 md:grid-cols-2">
                @csrf
                <input type="hidden" name="calon_siswa_id" value="{{ $calonSiswaId }}"> {{-- Menyimpan ID calon siswa untuk relasi --}}
                {{-- orangtua ayah --}}
                <div class="">
                    <div class="mb-3">
                        <label for="nama_ayah" class="block mb-1 text-sm text-gray-900">Nama ayah <span class="text-sm text-red-700">*</span></label>
                        <input name="nama_ayah" value="{{ old('nama_ayah') }}" type="text" id="nama_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nama_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik_ayah" class="block mb-1 text-sm text-gray-900">NIK <span class="text-sm text-red-700">*</span></label>
                        <input name="nik_ayah" value="{{ old('nik_ayah') }}" type="text" id="nik_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nik_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="t_lahir_ayah" class="block mb-1 text-sm text-gray-900">Tempat Lahir <span class="text-sm text-red-700">*</span></label>
                        <input name="t_lahir_ayah" value="{{ old('t_lahir_ayah') }}" type="text" id="t_lahir_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('t_lahir_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tgl_lahir_ayah" name="tgl_lahir_ayah" class="block mb-1 text-sm text-gray-900">Tanggal Lahir <span class="text-sm text-red-700">*</span></label>
                        <div class="relative max-w-sm mb-1">
                            <input name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah') }}" id="tgl_lahir_ayah" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div>
                        @error('tgl_lahir_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="agama_ayah" class="block mb-1 text-sm text-gray-900">Agama <span class="text-sm text-red-700">*</span></label>
                        <input name="agama_ayah" value="{{ old('agama_ayah') }}" type="text" id="agama_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('agama_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pendidikan_ayah" class="block mb-1 text-sm text-gray-900">Pendidikan Terakhir <span class="text-sm text-red-700">*</span></label>
                        <input name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" type="text" id="pendidikan_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('pendidikan_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_ayah" class="block mb-1 text-sm text-gray-900">Pekerjaan <span class="text-sm text-red-700">*</span></label>
                        <input name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" type="text" id="pekerjaan_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('pekerjaan_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="penghasilan_ayah" class="block mb-1 text-sm text-gray-900">Penghasilan <span class="text-sm text-red-700">*</span></label>
                        <input name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" type="text" id="penghasilan_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="contoh: Rp 5000000">
                        @error('penghasilan_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp_ayah" class="block mb-1 text-sm text-gray-900">Nomor HP <span class="text-sm text-red-700">*</span></label>
                        <input name="no_hp_ayah" value="{{ old('no_hp_ayah') }}" type="text" id="no_hp_ayah" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('no_hp_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat_ayah" class="block mb-1 text-sm text-gray-900">Alamat Rumah <span class="text-sm text-red-700">*</span></label>
                        <textarea name="alamat_ayah" value="{{ old('alamat_ayah') }}" id="alamat_ayah" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="Alamat domisili anda.."></textarea>
                        @error('alamat_ayah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- orangtua ibu --}}
                <div>
                    <div class="mb-3">
                        <label for="nama_ibu" class="block mb-1 text-sm text-gray-900">Nama Ibu <span class="text-sm text-red-700">*</span></label>
                        <input name="nama_ibu" value="{{ old('nama_ibu') }}" type="text" id="nama_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nama_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik_ibu" class="block mb-1 text-sm text-gray-900">NIK <span class="text-sm text-red-700">*</span></label>
                        <input name="nik_ibu" value="{{ old('nik_ibu') }}" type="text" id="nik_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nik_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="t_lahir_ibu" class="block mb-1 text-sm text-gray-900">Tempat Lahir <span class="text-sm text-red-700">*</span></label>
                        <input name="t_lahir_ibu" value="{{ old('t_lahir_ibu') }}" type="text" id="t_lahir_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('t_lahir_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tgl_lahir_ibu" name="tgl_lahir_ibu" class="block mb-1 text-sm text-gray-900">Tanggal Lahir <span class="text-sm text-red-700">*</span></label>
                        <div class="relative max-w-sm mb-1">
                            <input name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" id="tgl_lahir_ibu" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div>
                        @error('tgl_lahir_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="agama_ibu" class="block mb-1 text-sm text-gray-900">Agama <span class="text-sm text-red-700">*</span></label>
                        <input name="agama_ibu" value="{{ old('agama_ibu') }}" type="text" id="agama_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('agama_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pendidikan_ibu" class="block mb-1 text-sm text-gray-900">Pendidikan Terakhir <span class="text-sm text-red-700">*</span></label>
                        <input name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" type="text" id="pendidikan_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('pendidikan_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_ibu" class="block mb-1 text-sm text-gray-900">Pekerjaan <span class="text-sm text-red-700">*</span></label>
                        <input name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" type="text" id="pekerjaan_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('pekerjaan_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="penghasilan_ibu" class="block mb-1 text-sm text-gray-900">Penghasilan <span class="text-sm text-red-700">*</span></label>
                        <input name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" type="text" id="penghasilan_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="contoh: Rp 5000000">
                        @error('penghasilan_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp_ibu" class="block mb-1 text-sm text-gray-900">Nomor HP <span class="text-sm text-red-700">*</span></label>
                        <input name="no_hp_ibu" value="{{ old('no_hp_ibu') }}" type="text" id="no_hp_ibu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('no_hp_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat_ibu" class="block mb-1 text-sm text-gray-900">Alamat Rumah <span class="text-sm text-red-700">*</span></label>
                        <textarea name="alamat_ibu" value="{{ old('alamat_ibu') }}" id="alamat_ibu" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="Alamat domisili anda.."></textarea>
                        @error('alamat_ibu')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <x-primary-button>
                        {{ __('Selanjutnya') }}
                    </x-primary-button>
                </div>
                <span >
                    {{-- <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Selanjutnya</button> --}}
                </span>
            </form>
        </div>
    </div>
@endsection
