<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditCategory extends Component
{
    public $categoryID;
    public $name;
    public $description;
    public function render()
    {
        return view('livewire.adminpage.edit-category');
    }
    public function mount($id)
    {
        $this->categoryID = $id;
        $this->setForm();
    }


    public function setForm()
    {
        $getProducts = DB::table('product_category')
            ->select('product_category.name', 'product_category.description')
            ->where('product_category.id', $this->categoryID)
            ->first();

        if ($getProducts) {
            $this->name = $getProducts->name;
            $this->description = $getProducts->description;
        }
    }


    public function store()
    {
        $updateCategory = DB::table('product_category')
            ->where('product_category.id', $this->categoryID)
            ->update(
                [
                    'name' => $this->name,
                    'description' => $this->description,
                ]
            );

        if ($updateCategory) {
            $this->notification("success");
        } else {
            $this->notification("fail");
        }
    }


    public function cancel()
    {
        return redirect()->route('adminpage.product.category');
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'description',
        ]);
    }

    public function notification($status)
    {
        if ($status === "success") {
            $this->dispatch(
                "update_category_success",
                type: "success",
                title: "Sukses",
                text: "Update Kategori Berhasil!!",
                position: "center",
                timer: 2000
            );
        } else if ($status === "fail") {
            $this->dispatch(
                "update_category_fail",
                type: "error",
                title: "Error",
                text: "Gagal Kategori Produk!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
