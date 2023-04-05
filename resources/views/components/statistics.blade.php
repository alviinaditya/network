<div class="bg-white border-y dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between max-w-7xl mx-auto px-5">
        <div class="statistics">
            <div class="flex">
                <a href="{{ route('profile', $user->username) }}"
                    class="text-center px-5 py-3 border-r dark:border-gray-700">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{
                        $user->statuses->count() }}</span>
                    <span
                        class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Status</span>
                </a>
                <a href="{{ route('follows.index', [$user->username, " followers"]) }}"
                    class="text-center px-5 py-3 border-r dark:border-gray-700">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{
                        $user->followers->count() }}</span>
                    <span
                        class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Followers</span>
                </a>
                <a href="{{ route('follows.index', [$user->username, " following"]) }}" class="text-center px-5 py-3">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{
                        $user->follows->count() }}</span>
                    <span
                        class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Following</span>
                </a>
            </div>
        </div>
        @auth
        @if (Auth::user()->isNot($user))
        <div class="follow-button flex items-center px-5">
            <form action="{{ route('follows.store', $user) }}" method="post">
                @csrf
                @if(Auth::user()->hasFollow($user))
                <x-button class="!bg-red-500 hover:!bg-red-700 active:!bg-red-900 focus:!border-red-900 !ring-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2"
                        viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z" />
                    </svg>
                    Unfollow
                </x-button>
                @else
                <x-button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path
                            d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    </svg>
                    Follow
                </x-button>
                @endif
            </form>
        </div>
        @else
        <div class="follow-button flex items-center px-5">
            <a href="{{ route('profile.edit') }}"
                class="inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:border-cyan-900 focus:ring ring-cyan-300 disabled:opacity-25 transition ease-in-out duration-150">Edit
                Profile</a>
        </div>
        @endif
        @endauth
    </div>
</div>