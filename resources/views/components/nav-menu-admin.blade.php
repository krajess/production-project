@if (auth()->user()->is_admin)

<div class="flex">
    <div class="w-2/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <div class="text-center font-bold mb-4">
                <h2> {{ __("MANAGEMENT MENU") }} </h2>
            </div>
            <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
            
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Businesses</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.shops') }}" class="btn-dark block text-center">View Businesses</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Applications</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">View Applications</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Users</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.users') }}" class="btn-dark mb-2 block text-center">View Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif