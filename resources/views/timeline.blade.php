<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <x-card>
                    <div class="flex items-start">
                      <img class="mt-0.5 flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="https://i.pravatar.cc/150?u={{ Auth::user()->name }}"/>
                      <div class="ml-2 w-full">
                        <form action="{{ route('status.store') }}" method="post">
                            @csrf
                            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                    <textarea id="body" name="body" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="What's happend ?" required></textarea>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                    <x-button>
                                        Post
                                    </x-button>
                                    <div class="flex pl-0 space-x-1 sm:pl-2">
                                        <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                </x-card>
                <div class="space-y-3 mt-3">
                    @foreach ($statuses as $status)
                    <x-card>
                        <div class="flex mb-4 items-center">
                          <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="https://i.pravatar.cc/150?u={{ $status->user->name }}"/>
                          <div class="ml-2 mt-0.5">
                            <span class="block font-semibold text-base leading-snug text-black dark:text-gray-100">{{ $status->user->name }}</span>
                            <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $status->created_at->diffForHumans() }}</span>
                          </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">{{ $status->body }}</p>
                    </x-card>
                    @endforeach
                </div>
            </div>
            <div class="col-span-4">
                <x-card>
                    <h2 class="font-bold text-black dark:text-gray-100 text-lg pb-3">Recently Follows</h5>
                    <div class="space-y-3">
                        @foreach (Auth::user()->follows()->limit(5)->get() as $user)
                            <div class="flex mb-4 items-center">
                                <img class="flex-shrink-0 object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600 mr-3" src="https://i.pravatar.cc/150?u={{ $user->name }}"/>
                                <div class="ml-2 mt-0.5">
                                <span class="block font-semibold text-base leading-snug text-black dark:text-gray-100">{{ $user->name }}</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $user->pivot->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>