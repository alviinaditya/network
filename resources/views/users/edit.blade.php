<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Update Profile Information') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <div class="py-5">
                <form action="{{ route('profile.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', Auth::user()->name)" required />
                            @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                                :value="old('username', Auth::user()->username)" required />
                            @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email', Auth::user()->email)" required />
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-6">
                        <x-button>Update</x-button>
                    </div>
                </form>
            </div>
        </x-card>
    </x-container>
</x-app-layout>