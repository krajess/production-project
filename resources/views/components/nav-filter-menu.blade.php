@props(['vendor'])

<div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center"
    style="height: 500px; overflow-y: auto;">
    <div class="text-gray-900 dark:text-gray-100 w-full">
        <h2 class="text-center mb-2"> SEARCH </h2>
        <form action="{{ route('vendors.products.search', $vendor->id) }}" method="GET" class="w-full max-w-md mb-4 flex items-center">
            <input 
                type="text" 
                name="query" 
                placeholder="Search products..." 
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ request('query') }}">
            <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                </svg>
            </button>
        </form>
    </div>
</div>