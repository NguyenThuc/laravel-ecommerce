<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product as Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{

    use WithPagination;




    public function render()
    {



        $products = Product::paginate(10);
        $categories = Category::all();
    //    return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');

        return view('livewire.home-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
