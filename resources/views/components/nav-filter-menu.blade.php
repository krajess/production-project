@props(['vendor'])

<div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center"
    style="height: 320px; overflow-y: auto;">
    <div class="text-gray-900 dark:text-gray-100 w-full">
        <h2 class="text-center font-bold mb-2"> SEARCH </h2>
        <form action="{{ route('vendors.products.search', $vendor->id) }}" method="GET" class="w-full max-w-md mb-4 flex flex-col items-center">
            <input 
                type="text" 
                name="query" 
                placeholder="Search products..." 
                class="w-full px-4 py-2 border rounded-lg mb-2"
                value="{{ request('query') }}">
            
            <h2 class="text-center font-bold mb-2"> SORT BY </h2>
            <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2 border rounded-lg mb-2">
                <option value="" disabled selected>Default</option>
                <option value="price_low_to_high" {{ request('sort') === 'price_low_to_high' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high_to_low" {{ request('sort') === 'price_high_to_low' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="alph-a-z" {{ request('sort') === 'alph-a-z' ? 'selected' : '' }}>Name: A to Z</option>
                <option value="alph-z-a" {{ request('sort') === 'alph-z-a' ? 'selected' : '' }}>Name: Z to A</option>
                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Date: Old to New</option>
                <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Date: New to Old</option>
            </select>

            <button type="submit" class="p-2 bg-blue-500 text-white rounded-lg flex items-center justify-center w-full mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                </svg>SEARCH
            </button>
        </form>

        <form action="{{ route('vendors.products.search', $vendor->id) }}" method="GET" class="w-full max-w-md">
            <button type="submit" class="p-2 bg-red-500 text-white rounded-lg flex items-center justify-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>RESET FILTERS
            </button>
        </form>
    </div>
</div>