<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    public $productId; // এডিট করার জন্য আইডি

    public $name;

    public $description;

    public $price;

    public $stock;

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($this->productId);
        $product->update($validatedData);

        session()->flash('message', 'Product updated successfully!');

        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        return view('livewire.product.product-edit', [
            'product' => Product::find($this->productId),
        ]);
    }
}
