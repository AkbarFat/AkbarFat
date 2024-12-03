<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @vite(['resources/js/app.js'])


</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-gray-800"
            x-data="{
                cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
            }"
            @cart-change.window="cartItemsCount = $event.detail.count">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center justify-between">
                        <a href="/products" class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        </a>
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mt-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <!-- Cart Items Counter -->
                        <small
                            x-show="cartItemsCount"
                            x-transition
                            x-text="cartItemsCount"
                            x-cloak
                            class="py-[2px] px-[8px] rounded-full bg-red-500"></small>
                        <!--/ Cart Items Counter -->
                        <x-nav-link href="/cart" :active="request()->is('cart')">
                            Cart
                        </x-nav-link>


                        @guest
                        <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest
                        @auth
                        <x-nav-link href="/logout" :active="request()->is('logout')">Log out</x-nav-link>
                        @endauth
                    </div>
                </div>
            </div>
            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <div class="relative ml-3">
                        <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}} </h1>

                <x-button href="products/create">Create</x-button>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>

</body>


</html>
