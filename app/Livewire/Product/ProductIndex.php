<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $sortColumn = 'name';

    public $sortDirection = 'asc';

    public $search = '';

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
    }

    public function render()
    {
        // ১. ডাটা কুয়েরি করা
        $products = Product::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);

        // ২. লোড টাইম ক্যালকুলেশন (ms এ)
        $loadTime = round((microtime(true) - LARAVEL_START) * 1000, 2);

        return view('livewire.product.product-index', [
            'products' => $products,
            'loadTime' => $loadTime, // ৩. ভিউতে পাঠিয়ে দেওয়া
        ]);
    }
}
