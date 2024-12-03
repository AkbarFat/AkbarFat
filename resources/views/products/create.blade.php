<x-layout>
    <x-slot:heading>
        create
    </x-slot:heading>
</x-layout>

<form method="POST" action="/products">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="ml-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form-field>
                    <x-form-label for="name">Name of the product</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="name" id="name" placeholder="" :value="old('name')" required/>

                        <x-form-error name="name" />
                    </div>
                </x-form-field>
                <x-form-field>
                    <x-form-label for="description">description</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="description" id="description" placeholder="" :value="old('description')" required/>

                        <x-form-error name="description" />
                    </div>
                </x-form-field>
                <x-form-field>
                    <x-form-label for="price">price</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="price" id="price" placeholder="" :value="old('price')" required/>

                        <x-form-error name="price" />
                    </div>
                </x-form-field>
            </div>
        </div>
    </div>
    <div class="mt-6 mr-5 flex items-center justify-end gap-x-6 border-b border-gray-900/10 pb-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
        <x-form-button>Save</x-form-button>
    </div>
</form>
