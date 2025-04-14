<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('USER MESSAGES') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6">
            <x-nav-menu-admin>
            </x-nav-menu-admin>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4 mr-4">
            <div class="w-full md:w-2/2 py-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="text-center">
                                    <th class="px-4 py-2">User</th>
                                    <th class="px-4 py-2">Subject</th>
                                    <th class="px-4 py-2">Message</th>
                                    <th class="px-4 py-2">Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($messages as $message)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $message->user->first_name }} {{ $message->user->last_name }}</td>
                                        <td class="border px-4 py-2">{{ $message->subject }}</td>
                                        <td class="border px-4 py-2">{{ $message->message }}</td>
                                        <td class="border px-4 py-2">{{ $message->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>