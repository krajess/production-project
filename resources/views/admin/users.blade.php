<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
            <div class="text-gray-900 dark:text-gray-100 w-full">
                <div class="text-center font-bold mb-4">
                    <h2> {{ __("MANAGEMENT MENU") }} </h2>
                </div>
                <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
                <a href="{{ route('admin.shops') }}" class="btn-dark mb-2 block text-center">Businesses</a>
                <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">Applications</a>
                <a href="{{ route('admin.users') }}" class="btn-dark mb-2 block text-center">Users</a>
            </div>
        </div>

    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Roles
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->is_business_owner) Business Owner @endif
                                        @if ($user->is_business_manager) Business Manager @endif
                                        @if ($user->is_customer) Customer @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>