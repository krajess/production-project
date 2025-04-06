<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN DASHBOARD - Vendors') }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-menu-admin>

        </x-nav-menu-admin>

    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Vendor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Owner ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Owner Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Visible
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $vendor->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $vendor->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $vendor->owner_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $vendor->owner->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.vendors.VendorVisible', $vendor->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="checkbox" name="visible" {{ $vendor->visible ? 'checked' : '' }} onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('products.show_products', $vendor->id) }}" class="btn-dark">View</a>
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