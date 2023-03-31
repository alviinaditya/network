<x-app-layout>
    <div class="flex justify-center py-7 -mt-8 dark:bg-gray-800">
        <div class="text-center">
            <img class="flex-shrink-0 object-cover w-20 h-20 rounded-full ring ring-cyan-300 dark:ring-cyan-600 mx-auto mb-5 p-0.5" src="{{ $user->gravatar() }}"/>
            <div class="text-2xl font-semibold leading-snug text-black dark:text-gray-100 mb-2">{{ $user->name }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ "Joined " . $user->created_at->diffForHumans() }}</div>
        </div>
    </div>

    <x-statistics :user="$user"/>
            
    <x-container>
        <div class="grid grid-cols-4 gap-4 mt-5">
            <x-users-list :users="$follows" :hasCard="true"></x-users-list>
        </div>
    </x-container>
</x-app-layout>
