<div class="statistics">
    <div class="flex">
        <a href="{{ route('profile', $user->username) }}" class="text-center px-5 py-3 border-r dark:border-gray-700">
            <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->statuses->count() }}</span>
            <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Status</span>
        </a>
        <a href="{{ route('profile.follows', [$user->username, "followers"]) }}" class="text-center px-5 py-3 border-r dark:border-gray-700">
            <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->followers->count() }}</span>
            <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Followers</span>
        </a>
        <a href="{{ route('profile.follows', [$user->username, "following"]) }}" class="text-center px-5 py-3">
            <span class="block font-bold text-xl leading-snug text-black dark:text-gray-100">{{ $user->follows->count() }}</span>
            <span class="block uppercase font-semibold text-xs text-gray-500 dark:text-gray-400 leading-snug">Following</span>
        </a>
    </div>
</div>