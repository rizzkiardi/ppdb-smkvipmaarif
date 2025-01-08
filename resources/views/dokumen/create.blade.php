@extends('layouts.app')

@section('content')
    <x-breadcrumb :breadcrumbs="$breadcrumbs" />

    <!-- Content for Dokumen -->
    <div class="px-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <p class="text-lg mb-1">Terakhir, unggah Dokumen.</p>
            <p class="text-xs italic mb-4">*diharapkan scan dokumen terlebih dahulu. Jika sudah scan, unggah dokumen pada form yang tersedia.</p>
            <form action="{{ route('pendaftaran.dokumen.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto ">
                @csrf
                <input type="hidden" name="calon_siswa_id" value="{{ $calonSiswaId }}">
                <div>
                    <div class="mb-5">
                        <label for="pas_foto" class="block mb-1 text-sm font-medium text-gray-900">Pas Foto <span class="text-sm text-red-700">*</span></label>
                        <input type="file" id="pas_foto" name="pas_foto" value="{{ old('pas_foto') }}" class="block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <span class="text-xs text-gray-900">Format file JPG, JPEG, PNG (maksimal 2MB)</span>
                        @error('pas_foto')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            {{-- <span class="text-sm text-red-800 italic">{{ $message }}</span>    --}}
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="skl" class="block mb-1 text-sm font-medium text-gray-900" >Surat Keterangan LULUS<span class="text-sm text-red-700">*</span></label>
                        <input type="file" id="skl" name="skl" value="{{ old('skl') }}" class="block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <span class="text-xs text-gray-900">Format file JPG, JPEG, PNG (maksimal 2MB)</span>
                        @error('skl')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="ijazah" class="block mb-1 text-sm font-medium text-gray-900" >Ijazah </label>
                        <input type="file" id="ijazah" name="ijazah" value="{{ old('ijazah') }}" class="block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <span class="text-xs text-gray-900">Format file JPG, JPEG, PNG (maksimal 2MB)</span>
                        @error('ijazah')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            {{-- <span class="text-sm text-red-800 italic">{{ $message }}</span>    --}}
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="kk" class="block mb-1 text-sm font-medium text-gray-900" >Kartu Keluarga <span class="text-sm text-red-700">*</span> </label>
                        <input type="file" id="kk" name="kk" value="{{ old('kk') }}" class="block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <span class="text-xs text-gray-900">Format file JPG, JPEG, PNG (maksimal 2MB)</span>
                        @error('kk')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            {{-- <span class="text-sm text-red-800 italic">{{ $message }}</span>    --}}
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="akte" class="block mb-1 text-sm font-medium text-gray-900" >Akte Kelahiran <span class="text-sm text-red-700">*</span></label>
                        <input type="file" id="akte" name="akte" value="{{ old('akte') }}" class="block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <span class="text-xs text-gray-900">Format file JPG, JPEG, PNG (maksimal 2MB)</span>
                        @error('akte')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            {{-- <span class="text-sm text-red-800 italic">{{ $message }}</span>    --}}
                        @enderror
                    </div>
                </div>
                <x-primary-button class="">
                    {{ __('Unggah') }}
                </x-primary-button>
                {{-- <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Unggah</button> --}}
            </form>
        </div>
    </div>
@endsection
