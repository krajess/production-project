<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Not sure about something? Ask a question!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <h1 class="block text-lg font-bold text-gray-700"> Fill out the form below to send us a message. </h1>
                        <p class="text-gray-500 text-sm"> We will get back to you as soon as possible. </p>
                        <div class="mt-4">
                            <label for="email" class="block text-m font-bold text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="250" required>
                        </div>
                        <div class="mt-4">
                            <label for="subject" class="block text-m font-bold text-gray-700">Subject</label>
                            <p class="text-gray-500 text-sm">Max. 255 characters.</p>
                            <input type="text" name="subject" id="subject" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="255" required>
                        </div>
                        <div class="mt-4">
                            <label for="message" class="block text-m font-bold text-gray-700">Message</label>
                            <p class="text-gray-500 text-sm">Max. 1000 characters.</p>
                            <textarea name="message" id="message" rows="10" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="1000" required></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>