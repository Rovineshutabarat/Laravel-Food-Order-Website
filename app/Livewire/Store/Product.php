<?php

namespace App\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Product extends Component
{
    public $search = '';
    public $productFilter;
    public $productCategory;

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
                ->when($this->productCategory, function ($query, $category) {
                    return $query->where('product_category.name', $category);
                })
                ->when($this->productFilter === 'rating', function ($query) {
                    return $query->orderBy('average_rating', 'desc');
                })
                ->when($this->productFilter === 'harga', function ($query) {
                    return $query->orderBy('product.price', 'desc');
                })
                ->where(function ($query) {
                    $query->where('product.name', 'like', '%' . $this->search . '%')
                        ->orWhere('product.price', 'like', '%' . $this->search . '%')
                        ->orWhere('product_category.name', 'like', '%' . $this->search . '%');
                })
                ->groupBy('product.id')
                ->get()
        ]);
    }

    public function setCategory($category)
    {
        $this->productCategory = $category;
    }

    public function setFilter($filter)
    {

        $this->productFilter = $filter;
    }
}
