<div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg mt-10">
    <div class="mb-6 border-b pb-4 border-gray-100 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Create New Product</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Add details for your new marketplace item.</p>
    </div>

    <form wire:submit="save" class="space-y-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Product Name</label>
            <input type="text" wire:model="name" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition"
                placeholder="Enter product name">
            @error('name') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Description</label>
            <textarea wire:model="description" rows="3"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition"
                placeholder="Write a short description..."></textarea>
            @error('description') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Price ($)</label>
                <input type="number" step="0.01" wire:model="price" 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition"
                    placeholder="0.00">
                @error('price') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Initial Stock</label>
                <input type="number" wire:model="stock" 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition"
                    placeholder="e.g. 50">
                @error('stock') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-gray-700">
            <a href="{{ route('product.index') }}" wire:navigate 
                class="text-sm font-semibold text-gray-600 dark:text-gray-400 hover:underline">
                Cancel
            </a>
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-md flex items-center">
                <span wire:loading.remove wire:target="save">Save Product</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </form>
</div>