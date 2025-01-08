@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    <a href="{{ route('faq.index') }}" class="text-sm text-[#00AA5B] hover:underline">Kembali</a>

    <h1 class="mt-5 mb-2">Edit FAQ</h1>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-5">
                <div class="">
                    <label for="pertanyaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                    <input type="text" id="pertanyaan" name="question" required class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg  text-xs focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $faq->question }}">
                </div>
                
                <div>
                    <label for="jawaban" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                    <textarea id="jawaban" rows="4" name="answer" required class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{ $faq->answer }}</textarea>
                </div>
            </div>
            <button type="submit" class="my-5 py-2 px-6 text-sm rounded-md bg-[#00AA5B] text-white">Perbarui</button>
        </form>
    </div>
</div>
@endsection