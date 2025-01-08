@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    <div class="sm:gap-10 max-w-screen lg:max-w-screen-2xl space-y-10 ">
        <h1 class="text-lg font-bold mb-4">Notifikasi</h1>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg max-sm:p-8 max-sm:rounded-lg">
            @if($notifications->isNotEmpty())
                <ul class="bg-white shadow-md rounded-lg p-4">
                    @foreach ($notifications as $notification)
                    <li class="border-b last:border-b-0 py-2 flex justify-between">
                        <a href="{{ route('status.user') }}">                    
                            <div class="flex items-center gap-3">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M208 32c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 140.9 122-70.4c15.3-8.8 34.9-3.6 43.7 11.7l16 27.7c8.8 15.3 3.6 34.9-11.7 43.7L352 256l122 70.4c15.3 8.8 20.6 28.4 11.7 43.7l-16 27.7c-8.8 15.3-28.4 20.6-43.7 11.7L304 339.1 304 480c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-140.9L86 409.6c-15.3 8.8-34.9 3.6-43.7-11.7l-16-27.7c-8.8-15.3-3.6-34.9 11.7-43.7L160 256 38 185.6c-15.3-8.8-20.5-28.4-11.7-43.7l16-27.7C51.1 98.8 70.7 93.6 86 102.4l122 70.4L208 32z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm">{!! $notification->data['message'] ?? 'Pesan tidak tersedia' !!}</p>
                                    <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </a>
                        @if($notification->read_at === null)
                            <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="text-xs text-[#00AA5B] hover:underline">Tandai Dibaca</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="mx-auto py-4 text-center">
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Tidak ada Notifikasi.</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
