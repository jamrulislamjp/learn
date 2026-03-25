<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded">
    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

    <form wire:submit="update">
        <div class="mb-4">
            <label class="block">Product Name</label>
            <input type="text" wire:model="name" class="w-full border p-2 rounded">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Price</label>
            <input type="number" wire:model="price" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block">Stock</label>
            <input type="number" wire:model="stock" class="w-full border p-2 rounded">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('product.index') }}" wire:navigate class="text-gray-500 underline">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update Product</button>
        </div>
    </form>
</div>