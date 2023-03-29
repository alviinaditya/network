@foreach ($users as $user)
    <div class="flex mb-4 items-center">
        <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="{{ $user->gravatar() }}"/>
        <div class="ml-2 mt-0.5">
        <span class="block font-semibold text-base leading-snug text-black dark:text-gray-100"><a href="{{ route('profile', $user->username) }}">{{ $user->name }}</a></span>
        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $user->pivot->created_at->diffForHumans() }}</span>
        </div>
    </div>
@endforeach