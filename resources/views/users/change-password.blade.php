<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Change Password') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <div class="py-5">
                <form action="{{ route('change.password') }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <x-label for="current_password" :value="__('Current Password')" />
                        <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password"
                            required />
                        @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-6 mt-3 sm:grid-cols-2">
                        <div>
                            <x-label for="password" :value="__('New Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                            @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />
                            @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <x-button>Change</x-button>
                    </div>
                </form>
            </div>
        </x-card>
    </x-container>
</x-app-layout>