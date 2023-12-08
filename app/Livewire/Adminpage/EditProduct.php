<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;


    public $productID;
    public $name;
    public $price;
    public $category_id = 1;
    public $description;
    public $image;
    public $temporaryImage;


    public function render()
    {
        return view(
            'livewire.adminpage.edit-product',
            [
                'categories' => DB::table('product_category')->get()
            ]
        );
    }


    public function mount($id)
    {
        $this->productID = $id;
        $this->setForm();
    }


    public function setForm()
    {
        $getProducts = DB::table('product')
            ->select('product.name', 'product.price', 'product.description', 'product_category.id AS category', 'product.image')
            ->join('product_category', 'product.category_id', '=', 'product_category.id')
            ->where('product.id', $this->productID)
            ->first();

        if ($getProducts) {
            $this->name = $getProducts->name;
            $this->price = $getProducts->price;
            $this->description = $getProducts->description;
            $this->category_id = $getProducts->category;
            $this->temporaryImage = $getProducts->image;
        }
    }


    public function store()
    {
        $this->category_id = intval($this->category_id);

        $image_path = $this->image ? $this->image->store('uploads') : $this->temporaryImage;
        if (!str_starts_with($image_path, '/')) {
            $image_path = '/' . $image_path;
        }
        $updateProduct = DB::table('product')
            ->where('product.id', $this->productID)
            ->update(
                [
                    'name' => $this->name,
                    'price' => $this->price,
                    'category_id' => $this->category_id,
                    'description' => $this->description,
                    'image' => $image_path
                ]
            );

        if ($updateProduct) {
            $this->notification("success");
        } else {
            $this->notification("fail");
        }
    }


    public function cancel()
    {
        return redirect()->route('adminpage.product');
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'price',
            'category_id',
            'description',
            'image',
        ]);
    }

    public function notification($status)
    {
        if ($status === "success") {
            $this->dispatch(
                "update_product_success",
                type: "success",
                title: "Sukses",
                text: "Update Produk Berhasil!!",
                position: "center",
                timer: 2000
            );
            $this->resetForm();
        } else if ($status === "fail") {
            $this->dispatch(
                "update_product_fail",
                type: "error",
                title: "Error",
                text: "Gagal Update Produk!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
