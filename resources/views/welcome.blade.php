<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <x-application-logo class="w-16 h-16 fill-current text-cyan-500" />
                <h1 class="ml-5 text-7xl font-black text-cyan-500">Network</h1>
            </div>

            <div class="mt-8 overflow-hidden shadow sm:rounded-lg">
                <div class="flex space-x-5 justify-center">
                    <a class="inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:border-cyan-900 focus:ring ring-cyan-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('login') }}">Login</a>
                    <a class="inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:border-cyan-900 focus:ring ring-cyan-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
