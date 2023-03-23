<x-app-layout>
    <div class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 -mt-8">
        <div class="flex justify-between max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
            <div class="profiles">
                <div class="flex items-center">
                    <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="{{ $user->gravatar() }}"/>
                    <div class="ml-2">
                      <span class="block text-lg font-semibold leading-snug text-black dark:text-gray-100">{{ $user->name }}</span>
                      <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ "Joined " . $user->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <div class="statistics">
                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <span class="block font-semibold text-lg leading-snug text-black dark:text-gray-100">{{ $user->statuses->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Status</span>
                    </div>
                    <div class="text-center">
                        <span class="block font-semibold text-lg leading-snug text-black dark:text-gray-100">{{ $user->followers->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Followers</span>
                    </div>
                    <div class="text-center">
                        <span class="block font-semibold text-lg leading-snug text-black dark:text-gray-100">{{ $user->follows->count() }}</span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">Following</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
