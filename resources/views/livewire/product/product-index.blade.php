<div class="bg-[#f8f9fa] dark:bg-gray-950 min-h-screen p-2 sm:p-5 font-sans">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <div>
                <h1 class="text-lg font-bold text-gray-800 dark:text-gray-100">Product List</h1>
                <p class="text-[11px] text-gray-500 italic">Total {{ $products->total() }} items found in {{ $loadTime }}ms</p>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="flex bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm">
                    <button wire:click="exportCsv" class="p-1.5 hover:bg-gray-50 text-gray-600 border-r border-gray-200" title="Download CSV">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                    </button>
                    <button onclick="window.print()" class="p-1.5 hover:bg-gray-50 text-gray-600 border-r border-gray-200" title="Print">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" stroke-width="2"/></svg>
                    </button>
                    <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link Copied!')" class="p-1.5 hover:bg-gray-50 text-blue-600" title="Share Link">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" stroke-width="2"/></svg>
                    </button>
                </div>

                <a href="{{ route('product.create') }}" wire:navigate class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-xs font-semibold shadow-sm transition">
                    + New Product
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm overflow-hidden">
            
            <div class="p-3 border-b border-gray-100 dark:border-gray-800 bg-gray-50/30">
                <div class="relative max-w-xs">
                    <input type="text" wire:model.live.debounce.300ms="search" 
                        placeholder="ID, Name or SKU..." 
                        class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded px-8 py-1.5 text-xs focus:border-blue-500 focus:ring-0 transition">
                    <div class="absolute left-2.5 top-2 text-gray-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2"/></svg>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto" wire:loading.class="opacity-50">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 text-[10px] uppercase font-bold text-gray-400 tracking-tight">
                            <th class="px-4 py-3 w-10">#</th>
                            <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('name')">Name</th>
                            <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('price')">Price</th>
                            <th class="px-4 py-3">Stock</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                        @forelse($products as $product)
                            <tr class="hover:bg-[#fcfcfc] dark:hover:bg-gray-800/40 transition group">
                                <td class="px-4 py-2.5 text-[10px] text-gray-400 font-mono italic">
                                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-2.5">
                                    <div class="text-xs font-semibold text-gray-700 dark:text-gray-200">{{ $product->name }}</div>
                                    <div class="text-[10px] text-gray-400 truncate max-w-[200px]">{{ $product->description }}</div>
                                </td>
                                <td class="px-4 py-2.5">
                                    <span class="text-xs font-mono font-bold text-gray-600 dark:text-gray-400">${{ number_format($product->price, 2) }}</span>
                                </td>
                                <td class="px-4 py-2.5">
                                    <span class="inline-block w-2 h-2 rounded-full mr-1 {{ $product->stock < 10 ? 'bg-orange-400' : 'bg-green-400' }}"></span>
                                    <span class="text-[11px] text-gray-500">{{ $product->stock }} units</span>
                                </td>
                                <td class="px-4 py-2.5 text-right opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="flex justify-end items-center gap-3">
                                        <a href="{{ route('product.edit', $product->id) }}" wire:navigate class="text-blue-500 text-[11px] hover:underline">Edit</a>
                                        <button wire:click="delete({{ $product->id }})" wire:confirm="Delete?" class="text-red-400">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-10 text-center text-xs text-gray-400 italic">No records to display.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3 bg-gray-50/50 dark:bg-gray-800/20 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between">
                <div class="text-[10px] text-gray-400 font-medium tracking-tight">
                    SHOWING {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} OF {{ $products->total() }}
                </div>
                <div class="frappe-pagination">
                    {{ $products->links(data: ['navigate' => true]) }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Frappe Style Pagination Tweak */
    .frappe-pagination nav svg { height: 16px; width: 16px; }
    .frappe-pagination nav div div span, .frappe-pagination nav div div a { 
        padding: 4px 8px !important; 
        font-size: 10px !important; 
        border-radius: 4px !important;
    }
</style>