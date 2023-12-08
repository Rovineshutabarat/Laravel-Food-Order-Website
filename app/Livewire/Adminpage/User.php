<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        return view(
            'livewire.adminpage.user',
            [
                'users' => DB::table('user')
                    ->select('user.id', 'user.username', 'user.email', 'user.role', 'user.phone_number')
                    ->where('user.username', 'like', '%' . $this->search . '%')
                    ->orWhere('user.email', 'like', '%' . $this->search . '%')
                    ->orWhere('user.phone_number', 'like', '%' . $this->search . '%')
                    ->orWhere('user.role', 'like', '%' . $this->search . '%')
                    ->paginate(10)
            ]
        );
    }
    public function setAdmin($id)
    {
        $getRole = DB::table('user')->where('user.id', $id)->select('user.role')->first();
        $setUserRole = DB::table('user')
            ->where('user.id', $id)
            ->update(
                [
                    'role' => $getRole->role === "superadmin" ? "user" : "superadmin"
                ]
            );

        if (!$setUserRole) {
            $this->dispatch(
                "update_role_fail",
                type: "error",
                title: "Error",
                text: "Gagal Update Role!!",
                position: "center",
                timer: 2000
            );
        }
        $this->dispatch(
            "update_role_success",
            type: "success",
            title: "Sukses",
            text: "Role Pengguna Berhasil Di Update!!",
            position: "center",
            timer: 2000
        );
    }
}
