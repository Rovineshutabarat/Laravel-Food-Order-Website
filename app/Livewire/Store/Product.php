<?php

namespace App\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Product extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.store.product', [
            'products' => DB::table('product')
                ->leftJoin('review', 'product.id', '=', 'review.product_id')
                ->leftJoin('product_category', 'product.category_id', '=', 'product_category.id')
                ->select(
                    'product.id',
                    'product.name',
                    'product.image',
                    'product.price',
                    'product_category.name AS category',
                    DB::raw('AVG(review.rating) as average_rating')
                )
                ->where('product.name', 'like', '%' . $this->search . '%')
                ->groupBy('product.id')
                ->paginate(10)

        ]);
    }
}
