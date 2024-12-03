<x-layout>
    <x-slot:heading>
        Products
    </x-slot:heading>

    <menu id="app" class="flex space-x-1 mt-3 overflow-x-auto pb-2 pt-1">
        <li>
            <pill href="/products" :active="request()->is('porducts')">All</pill>
        </li>
        <li>
            @foreach($categories as $category)
            <pill href="{{ route('products.index', ['category' => $category->slug]) }}">{{$category->name}}</pill>
            <!-- bilmidigan narsammi implement qildim -->
            @endforeach
        </li>
    </menu>

    <div id="app" class="container mx-auto py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="max-w-xs bg-white rounded-lg shadow-lg p-4">
                <a href="products/{{$product['id']}}">
                    <div class="flex justify-center">
                        <!-- Dynamic Product Image -->
                        <img href='#' src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-48 h-48 object-contain">
                    </div>

                    <div class="mt-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-xl font-bold text-gray-900 mt-2">${{ ($product->price) }}</p>
                    </div>
                </a>

                <div class="flex justify-between items-center mt-4">
                    <!-- Wishlist Button -->
                    <button class="text-purple-600 border-2 border-purple-600 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>

                    <!-- Add to Cart Button -->
                    <button href="/cart/add/{{$product->id}}" class="bg-purple-600 text-white py-2 px-4 rounded-lg" @click="addToCart(1)">
                        Add to Cart
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>
