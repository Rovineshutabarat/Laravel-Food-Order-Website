<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Category extends Component
{
    use WithPagination;
    public $search = '';
    public $categoryFilter = '';
    public function render()
    {
        return view(
            "livewire.adminpage.category",
            [
                'categories' => DB::table('product_category')
                    ->select(
                        'product_category.id',
                        'product_category.name AS category_name',
                        'product_category.description AS category_description',
                        DB::raw('COUNT(product.id) AS total_product'),
                        DB::raw('ROUND(AVG(review.rating), 1) as average_rating')
                    )
                    ->leftJoin('product', 'product.category_id', '=', 'product_category.id')
                    ->leftJoin('review', 'product.id', '=', 'review.product_id')
                    ->when($this->categoryFilter === 'rating', function ($query) {
                        return $query->orderBy('average_rating', 'desc');
                    })
                    ->when($this->categoryFilter === 'total_product', function ($query) {
                        return $query->orderBy('total_product', 'desc');
                    })
                    ->where(function ($query) {
                        $query->where('product_category.name', 'like', '%' . $this->search . '%');
                    })
                    ->groupBy('product_category.id', 'product_category.name')
                    ->paginate(10)
            ]
        );
    }

    public function delete($id)
    {
        $categories = DB::table('product')
            ->where('category_id', $id)
            ->count();

        if ($categories <= 0) {
            $deleteCategory = DB::table('product_category')
                ->where('product_category.id', $id)
                ->delete();

            if ($deleteCategory) {
                $this->dispatch(
                    "delete_category_success",
                    type: "success",
                    title: "Sukses",
                    text: "Berhasil Hapus Kategori Produk!!",
                    position: "center",
                    timer: 3000
                );
            }
        } else {
            $this->dispatch(
                "delete_category_fail",
                type: "error",
                title: "Error",
                text: "Anda Tidak Dapat Menghapus Kategori Ini Karena Terdapat " . $categories . " Produk Yang Menggunakan Kategori Ini!",
                position: "center",
                timer: 2000
            );
        }
    }
}
