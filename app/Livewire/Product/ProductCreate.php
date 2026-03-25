<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{

    public $name;
    public $description;
    public $price;
    public $stock;


    public function render()
    {
        return view('livewire.product.product-create');
    }

    public function save()
    {
        // Validate the input data
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Create the product using the validated data
        Product::create($validatedData);
        // Optionally, you can reset the form fields or redirect to another page
        $this->reset(); // Reset form fields
        session()->flash('message', 'Product created successfully!'); // Flash message
        return $this->redirect('/products', navigate: true);
    }
}
