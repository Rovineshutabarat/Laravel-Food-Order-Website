<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Transcation extends Component
{
    public function render()
    {
        return view(
            'livewire.adminpage.transcation',
            [
                'orders' => DB::table('orders')
                    ->join('user', 'orders.user_id', '=', 'user.id')
                    ->join('product', 'orders.product_id', '=', 'product.id')
                    ->select('orders.id', 'user.username as name', 'user.phone_number', 'product.name as product', 'orders.amount', 'orders.qty', 'orders.status')
                    ->paginate(10)
            ]
        );
    }

    public function delete($id)
    {
        $deleteOrder = DB::table('orders')
            ->where('orders.id', $id)
            ->delete();
        if (!$deleteOrder) {
            $this->dispatch(
                "delete_order_fail",
                type: "error",
                title: "Error",
                text: "Gagal Update Status Pembayaran!!",
                position: "center",
                timer: 2000
            );
        }
        $this->dispatch(
            "delete_order_success",
            type: "success",
            title: "Sukses",
            text: "Status Pembayaran Berhasil Di Update!!",
            position: "center",
            timer: 2000
        );
    }

    public function pay($id)
    {
        $getStatus = DB::table('orders')
            ->where('orders.id', $id)
            ->select('orders.status')
            ->first();

        $updateStatus = DB::table('orders')
            ->where('orders.id', $id)
            ->update(
                [
                    'status' => $getStatus->status === "Paid" ? "Unpaid" : "Paid"
                ]
            );

        if (!$updateStatus) {
            $this->dispatch(
                "update_status_fail",
                type: "error",
                title: "Error",
                text: "Gagal Update Status Pembayaran!!",
                position: "center",
                timer: 2000
            );
        }
        $this->dispatch(
            "update_status_success",
            type: "success",
            title: "Sukses",
            text: "Status Pembayaran Berhasil Di Update!!",
            position: "center",
            timer: 2000
        );
    }
}
