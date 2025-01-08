@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
        <a href="{{ route('faq.index') }}" class="text-sm text-[#00AA5B] hover:underline">Kembali</a>
        <h1 class="mt-3 mb-2">Buat Pertanyaan dan Jawaban</h1>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div class="">
                        <label for="pertanyaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                        <input type="text" id="pertanyaan" name="question" required class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg  text-sm focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </div>
                    
                    <div>
                        <label for="jawaban" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                        <textarea id="jawaban" rows="4" name="answer" required class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                    </div>
                </div>
                <button type="submit" class="my-5 py-2 px-6 text-sm rounded-md bg-[#00AA5B] text-white">Simpan</button>
            </form>
        </div>
    {{-- </div> --}}
</div>
@endsection