@props(['hasCard', 'users'])

@php
$card = ($hasCard ?? false)
? 'px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg'
: '';
@endphp

@foreach ($users as $user)
<div class="flex items-center justify-between {{ $card }}">
    <div class="flex items-center">
        <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3"
            src="{{ $user->gravatar() }}" />
        <div class="ml-2 mt-0.5">
            <span class="block font-semibold text-base leading-snug text-black dark:text-gray-100"><a
                    href="{{ route('profile', $user->username) }}">{{ $user->name }}</a></span>
            @if ($user->pivot)
            <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{
                $user->pivot->created_at->diffForHumans() }}</span>
            @endif
        </div>
    </div>

    @if (request()->routeIs('users.index'))
    <div>
        <form action="{{ route('follows.store', $user) }}" method="post">
            @csrf
            @if(Auth::user()->hasFollow($user))
            <x-button class="!bg-red-500 hover:!bg-red-700 active:!bg-red-900 focus:!border-red-900 !ring-red-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z" />
                </svg>
            </x-button>
            @else
            <x-button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path
                        d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                </svg>
            </x-button>
            @endif
        </form>
    </div>
    @endif
</div>
@endforeach