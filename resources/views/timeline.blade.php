<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <div class="space-y-3">
                    @foreach ($statuses as $status)
                    <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg">
                        <div class="flex mb-4 items-center">
                          <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="https://i.pravatar.cc/150?u={{ $status->user->name }}"/>
                          <div class="ml-2 mt-0.5">
                            <span class="block font-semibold text-base leading-snug text-black dark:text-gray-100">{{ $status->user->name }}</span>
                            <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $status->created_at->diffForHumans() }}</span>
                          </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">{{ $status->body }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-4">Friends</div>
        </div>
    </x-container>
</x-app-layout>