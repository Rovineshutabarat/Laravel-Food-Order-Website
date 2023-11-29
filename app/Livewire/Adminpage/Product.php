<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public $search = '';
    public $productCategory = '';
    public $productFilter = '';
    public function render()
    {
        return view(
            "livewire.adminpage.product",
            [
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
                    ->when($this->productCategory, function ($query, $category) {
                        return $query->where('product_category.name', $category);
                    })
                    ->when($this->productFilter === 'rating', function ($query) {
                        return $query->orderBy('average_rating', 'desc');
                    })
                    ->when($this->productFilter === 'harga', function ($query) {
                        return $query->orderBy('product.price', 'desc');
                    })
                    ->groupBy('product.id')
                    ->paginate(10)
            ]
        );
    }
    public function delete($id)
    {
        $deleteProduct = DB::table('product')->where("id", "=", $id)->delete();
        if ($deleteProduct) {
            $this->loadProduct();
            $this->dispatch(
                "delete_success",
                type: "success",
                title: "Sukses",
                text: "Produk Berhasil Dihapus!!",
                position: "center",
                timer: 2000
            );
        }
    }
    public function edit($id)
    {
        return redirect(
            'adminpage.edit.product',
            [
                'name' => 'John Doe',
                'age' => 30,
            ]
        );
    }
}
