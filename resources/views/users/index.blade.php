<x-app-layout>
    <x-container>
        <div class="grid grid-cols-3 gap-4">
            <x-users-list :users="$users" :hasCard="true"></x-users-list>
        </div>
        <div class="mt-5">
            {{ $users->links() }}
        </div> 
    </x-container>
</x-app-layout>