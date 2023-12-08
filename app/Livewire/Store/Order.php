<?php

namespace App\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order extends Component
{
    public function render()
    {
        return view(
            'livewire.store.order',
            [
                'orders' => DB::table('orders')
                    ->where('orders.user_id', Auth::user()->id)
                    ->select('orders.id', 'product.name', 'product.price', 'product.image', 'product_category.name AS category', 'orders.qty', 'orders.status', 'orders.amount')
                    ->join('product', 'orders.product_id', '=', 'product.id')
                    ->join('product_category', 'product.category_id', '=', 'product_category.id')
                    ->get(),
                'subtotal' => DB::table('orders')
                    ->where('orders.user_id', Auth::user()->id)
                    ->sum('orders.amount')
            ]
        );
    }

    public function deleteOrder($id)
    {
        $deleteOrder = DB::table('orders')
            ->where('orders.id', $id)
            ->delete();

        if ($deleteOrder) {
            $this->dispatch(
                "delete_order_success",
                type: "success",
                title: "Sukses",
                text: "Produk Berhasil Dihapus!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
