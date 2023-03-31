<div class="bg-white border-y dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between max-w-7xl mx-auto px-5">
        <div class="statistics">
            <div class="flex">
                <a href="{{ route('profile', $user->username) }}" class="text-center px-5 py-3 border-r dark:border-gray-700">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->statuses->count() }}</span>
                    <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Status</span>
                </a>
                <a href="{{ route('follows.index', [$user->username, "followers"]) }}" class="text-center px-5 py-3 border-r dark:border-gray-700">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->followers->count() }}</span>
                    <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Followers</span>
                </a>
                <a href="{{ route('follows.index', [$user->username, "following"]) }}" class="text-center px-5 py-3">
                    <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->follows->count() }}</span>
                    <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Following</span>
                </a>
            </div>
        </div>
        @auth
            @if (Auth::user()->isNot($user))
            <div class="follow-button flex items-center px-5">
                <form action="{{ route('follows.store', $user) }}" method="post">
                    @csrf
                    <x-button>
                        @if(Auth::user()->hasFollow($user))
                            Unfollow
                        @else 
                            Follow
                        @endif
                    </x-button>
                </form>
            </div>
            @else
            <div class="follow-button flex items-center px-5">
                <x-button>Edit Profile</x-button>
            </div>
            @endif
        @endauth
    </div>
</div>