<x-app-layout>
    <div class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 -mt-8">
        <div class="flex justify-center py-7">
            <div class="text-center">
                <img class="flex-shrink-0 object-cover w-20 h-20 rounded-full ring ring-gray-300 dark:ring-gray-600 mx-auto mb-5" src="{{ $user->gravatar() }}"/>
                <div class="text-2xl font-semibold leading-snug text-black dark:text-gray-100 mb-2">{{ $user->name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ "Joined " . $user->created_at->diffForHumans() }}</div>
            </div>
        </div>
        
        <div class="flex justify-between max-w-7xl mx-auto border-t px-5 dark:border-gray-700">
            <div class="statistics">
                <div class="flex">
                    <div class="text-center px-5 py-3 border-r dark:border-gray-700">
                        <span class="block font-semibold text-xl leading-snug text-black dark:text-gray-100">{{ $user->statuses->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Status</span>
                    </div>
                    <div class="text-center px-5 py-3 border-r dark:border-gray-700">
                        <span class="block font-semibold text-xl leading-snug text-black dark:text-gray-100">{{ $user->followers->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Followers</span>
                    </div>
                    <div class="text-center px-5 py-3">
                        <span class="block font-semibold text-xl leading-snug text-black dark:text-gray-100">{{ $user->follows->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Following</span>
                    </div>
                </div>
            </div>
            @if ($user->id != Auth::user()->id)
            <div class="follow-button flex items-center">
                <x-button>Follow</x-button>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
