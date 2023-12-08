<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $category_id = 1;
    public $description;
    public $image;

    public function render()
    {
        return view(
            'livewire.adminpage.add-product',
            [
                'categories' => DB::table('product_category')->select('product_category.name', 'product_category.id')->get(),
            ]
        );
    }

    public function store()
    {
        $this->category_id = intval($this->category_id);
        $this->validate(
            [
                'name' => 'required|string',
                'price' => 'required|integer',
                'category_id' => 'required|integer',
                'description' => 'required',
                'image' => 'required|image|max:1024'
            ]
        );
        $image_path = $this->image->store('uploads');
        if (!str_starts_with($image_path, '/')) {
            $image_path = '/' . $image_path;
        }
        $createProduct = DB::table('product')->insert(
            [
                'name' => $this->name,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'image' => $image_path
            ]
        );

        if ($createProduct) {
            $this->notification('success');
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
                "create_product_success",
                type: "success",
                title: "Sukses",
                text: "Tambah Produk Berhasil!!",
                position: "center",
                timer: 2000
            );
            $this->resetForm();
        } else if ($status === "fail") {
            $this->dispatch(
                "create_product_fail",
                type: "error",
                title: "Error",
                text: "Gagal Menambahkan Produk!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
