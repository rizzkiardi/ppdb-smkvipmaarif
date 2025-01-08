
@extends('layouts.app')

@section('content')
    <x-breadcrumb :breadcrumbs="$breadcrumbs" />

    <!-- Content for Biodata Siswa -->
    <div class="px-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <p class="text-lg mb-1">Formulir Calon siswa SMK VIP Maarif NU 1 Kemiri.</p>
            <p class="text-xs italic mb-4">*pastikan mengisi formulir dengan lengkap dan benar. </p>
            <form action="{{ route('pendaftaran.calon-siswa.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto grid  gap-10 sm:grid-cols-1 md:grid-cols-2 ">
                @csrf
                @if (Auth::user()->role == 'admin')
                <div>
                    <div class="mb-3 ">
                        <label for="nama" class="block mb-1 text-sm text-gray-900">Nama Lengkap <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" id="nama"  class="@error('nama') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nama')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            {{-- <span class="text-sm text-red-800 italic">{{ $message }}</span>    --}}
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tempat_lahir" class="block mb-1 text-sm text-gray-900">Tempat Lahir <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir"  class="@error('tempat_lahir') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('tempat_lahir')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="agama" class="block mb-1 text-sm text-gray-900">Agama <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="agama" value="{{ old('agama') }}" id="agama"  class="@error('agama') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('agama')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="nik"  class="block mb-1 text-sm text-gray-900">NIK <span class="text-sm text-red-700">*</span></label>
                        <input type="number" name="nik" value="{{ old('nik') }}" id="nik" class="@error('nik') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nik')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="sekolah_asal"  class="block mb-1 text-sm text-gray-900">Sekolah Asal <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal') }}" id="sekolah_asal" class="@error('sekolah_asal') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('sekolah_asal')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="kartu_pip"  class="block mb-1 text-sm text-gray-900">Kartu PIP <span class="text-sm text-red-700">*</span></label>
                            <select id="kartu_pip" name="kartu_pip" value="{{ old('kartu_pip') }}"  class="@error('kartu_pip') is-invalid @enderror block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            @error('kartu_pip')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            @enderror
                    </div>
                    
                    <div class="mb-2">
                        <label for="jurusan"  class="block mb-1 text-sm text-gray-900">Jurusan <span class="text-sm text-red-700">*</span></label>
                        <select id="jurusan" name="jurusan" value="{{ old('jurusan') }}"  class="@error('jurusan') is-invalid @enderror block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Ototronik">Ototronik</option>
                        </select>
                        @error('jurusan')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <label for="j_kelamin" class="block mb-1 text-sm text-gray-900">Jenis kelamin <span class="text-sm text-red-700">*</span></label>
                        <select id="j_kelamin" name="j_kelamin" value="{{ old('j_kelamin') }}"  class="@error('j_kelamin') is-invalid @enderror block w-full p-2 mb-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('j_kelamin')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tgl_lahir" name="tgl_lahir" class="block mb-1 text-sm text-gray-900">Tanggal Lahir <span class="text-sm text-red-700">*</span></label>
                        <div class="relative max-w-sm mb-1">
                            <input name="tgl_lahir" value="{{ old('tgl_lahir') }}" id="tgl_lahir" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div>
                        @error('tgl_lahir')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="block mb-1 text-sm text-gray-900">NISN <span class="text-sm text-red-700">*</span></label>
                        <input id="nisn" type="text" name="nisn" value="{{ old('nisn') }}" class=" @error('nisn') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nisn')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tahun_lulus" class="block mb-1 text-sm text-gray-900">Tahun Lulus <span class="text-sm text-red-700">*</span></label>
                        <input id="tahun_lulus" type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" class="@error('tahun_lulus') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('tahun_lulus')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="block mb-1 text-sm text-gray-900">Nomor HP <span class="text-sm text-red-700">*</span></label>
                        <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}"  class="@error('no_hp') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('no_hp')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="block mb-1 text-sm text-gray-900">Alamat Rumah <span class="text-sm text-red-700">*</span></label>
                        <textarea id="alamat" name="alamat" value="{{ old('alamat') }}" rows="4" class=" @error('alamat') is-invalid @enderror  block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="Alamat Domisili anda. "></textarea>
                        @error('alamat')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <x-primary-button>
                        {{ __('Selanjutnya') }}
                    </x-primary-button>
                </div> 
                @endif
                
                @if (Auth::user()->role == 'user')
                <div>
                    <div class="mb-3">
                        <label for="nama" class="block mb-1 text-sm text-gray-900">Nama Lengkap <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $userName ?? '') }}" readonly id="nama"
                            class="@error('nama') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nama')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tempat_lahir" class="block mb-1 text-sm text-gray-900">Tempat Lahir <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir"  class="@error('tempat_lahir') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('tempat_lahir')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="agama" class="block mb-1 text-sm text-gray-900">Agama <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="agama" value="{{ old('agama') }}" id="agama"  class="@error('agama') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('agama')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="nik"  class="block mb-1 text-sm text-gray-900">NIK <span class="text-sm text-red-700">*</span></label>
                        <input type="number" name="nik" value="{{ old('nik') }}" id="nik" class="@error('nik') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nik')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="sekolah_asal"  class="block mb-1 text-sm text-gray-900">Sekolah Asal <span class="text-sm text-red-700">*</span></label>
                        <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal') }}" id="sekolah_asal" class="@error('sekolah_asal') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('sekolah_asal')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="kartu_pip"  class="block mb-1 text-sm text-gray-900">Kartu PIP <span class="text-sm text-red-700">*</span></label>
                            <select id="kartu_pip" name="kartu_pip" value="{{ old('kartu_pip') }}"  class="@error('kartu_pip') is-invalid @enderror block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            @error('kartu_pip')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                            @enderror
                    </div>
                    
                    <div class="mb-2">
                        <label for="jurusan"  class="block mb-1 text-sm text-gray-900">Jurusan <span class="text-sm text-red-700">*</span></label>
                        <select id="jurusan" name="jurusan" value="{{ old('jurusan') }}"  class="@error('jurusan') is-invalid @enderror block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Ototronik">Ototronik</option>
                        </select>
                        @error('jurusan')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <label for="j_kelamin" class="block mb-1 text-sm text-gray-900">Jenis kelamin <span class="text-sm text-red-700">*</span></label>
                        <select id="j_kelamin" name="j_kelamin" value="{{ old('j_kelamin') }}"  class="@error('j_kelamin') is-invalid @enderror block w-full p-2 mb-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('j_kelamin')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tgl_lahir" name="tgl_lahir" class="block mb-1 text-sm text-gray-900">Tanggal Lahir <span class="text-sm text-red-700">*</span></label>
                        <div class="relative max-w-sm mb-1">
                            <input name="tgl_lahir" value="{{ old('tgl_lahir') }}" id="tgl_lahir" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div>
                        @error('tgl_lahir')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="block mb-1 text-sm text-gray-900">NISN <span class="text-sm text-red-700">*</span></label>
                        <input id="nisn" type="text" name="nisn" value="{{ old('nisn') }}" class=" @error('nisn') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('nisn')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tahun_lulus" class="block mb-1 text-sm text-gray-900">Tahun Lulus <span class="text-sm text-red-700">*</span></label>
                        <input id="tahun_lulus" type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" class="@error('tahun_lulus') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('tahun_lulus')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="block mb-1 text-sm text-gray-900">Nomor HP <span class="text-sm text-red-700">*</span></label>
                        <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}"  class="@error('no_hp') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50">
                        @error('no_hp')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="block mb-1 text-sm text-gray-900">Alamat Rumah <span class="text-sm text-red-700">*</span></label>
                        <textarea id="alamat" name="alamat" value="{{ old('alamat') }}" rows="4" class=" @error('alamat') is-invalid @enderror  block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50" placeholder="Alamat Domisili anda. "></textarea>
                        @error('alamat')
                            <div class="py-1 px-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="text-sm italic">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <x-primary-button>
                        {{ __('Selanjutnya') }}
                    </x-primary-button>
                </div> 
                @endif

                {{-- <button type="submit" value="save" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center font-medium">Selanjutnya</button> --}}
            </form>
        </div>
    </div>
@endsection

