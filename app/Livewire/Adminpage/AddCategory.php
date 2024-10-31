<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddCategory extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.adminpage.add-category');
    }
    public function store()
    {
        $this->validate(
            [
                'name' => 'required|string',
                'description' => 'required',
            ]
        );
        $createCategory = DB::table('product_category')->insert(
            [
                'name' => $this->name,
                'description' => $this->description,
            ]
        );

        if ($createCategory) {
            $this->notification('success');
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
                "success_notification",
                type: "success",
                title: "Sukses",
                text: "Tambah Kategori Berhasil!!",
                position: "center",
                timer: 2000
            );
            $this->resetForm();
        } else if ($status === "fail") {
            $this->dispatch(
                "err_notification",
                type: "error",
                title: "Error",
                text: "Gagal Menambahkan Kategori!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
