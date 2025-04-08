<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN MANAGEMENT - APPLICATIONS') }}
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
                                    User ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Vendor Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    View Application
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-center dark:text-gray-400 uppercase tracking-wider">
                                    Update Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $application->user_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $application->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $application->first_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $application->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $application->vendor_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.show-application', $application->id) }}" class="btn-dark">View</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($application->status != 'accepted' && $application->status != 'rejected')
                                        <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                                <option value="new" {{ $application->status == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                            <button type="submit" class="btn-dark mt-2">Update</button>
                                        </form>
                                        @else
                                        <p>{{ $application->status }}</p>
                                        @endif
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