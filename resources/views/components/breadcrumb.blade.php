@props(['breadcrumbs'])



<nav class="flex px-6 pt-6 pb-2 text-sm mb-1" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <!-- Biodata Siswa -->
        <li class="inline-flex items-center">
            <a href="{{ route('pendaftaran.calon-siswa.create') }}"
               class="text-gray-800  {{ Request::routeIs('pendaftaran.calon-siswa.create') ? '!text-[#00AA5B] font-semibold' : '' }}">
                Biodata Siswa
            </a>
        </li>
        <svg class="w-6 h-6 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        
        <!-- Biodata Orangtua -->
        <li class="inline-flex items-center">
            <a href="{{ route('pendaftaran.orangtua.create') }}"
               class="text-gray-800  {{ Request::routeIs('pendaftaran.orangtua.create') ? '!text-[#00AA5B] font-semibold' : '' }}">
                Biodata Orangtua
            </a>
        </li>
        <svg class="w-6 h-6 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>

        <!-- Unggah Dokumen -->
        <li class="inline-flex items-center">
            <a href="{{ route('pendaftaran.dokumen.create') }}"
               class="text-gray-800  {{ Request::routeIs('pendaftaran.dokumen.create') ? '!text-[#00AA5B] font-semibold' : '' }}">
                Unggah Dokumen
            </a>
        </li>
    </ol>
</nav>


