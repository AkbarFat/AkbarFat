<x-layout>
    <x-slot:heading>
        Cart
    </x-slot:heading>

    <div id="app">
        <cart :initial-cart-items='@json($cartItemsJson)' :total="{{ $total }}"></cart>
    </div>

    <script src="{{ ('js/app.js') }}"></script>
</x-layout>
