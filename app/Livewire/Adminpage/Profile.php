<?php

namespace App\Livewire\Adminpage;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $userID;
    public $isEdit;
    public $username;
    public $image;
    public $address;
    public $phone_number;
    public $temporaryImage;
    public function render()
    {
        return view(
            'livewire.adminpage.profile',
            [
                'user' => DB::table('user')
                    ->select('user.id', 'user.username', 'user.email', 'user.image', 'user.phone_number', 'user.address', 'user.created_at')
                    ->where('user.id', $this->userID)
                    ->first(),
                'total_review' => DB::table('review')
                    ->where('user_id', $this->userID)
                    ->count(),
                'total_order' => DB::table('orders')
                    ->where('user_id', $this->userID)
                    ->count(),
                'completed_order' => DB::table('orders')
                    ->where('user_id', $this->userID)
                    ->where('status', 'Paid')
                    ->count()
            ]
        );
    }

    public function mount($id)
    {
        $this->userID = $id;
        $this->setForm();
    }

    public function setForm()
    {
        $getImage = DB::table('user')
            ->select('user.image', 'user.username', 'user.address', 'user.phone_number')
            ->where('user.id', $this->userID)
            ->first();
        if ($getImage) {
            $this->temporaryImage = $getImage->image;
            $this->username = $getImage->username;
            $this->address = $getImage->address;
            $this->phone_number = $getImage->phone_number;
        }
    }

    public function setIsEdit()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function store()
    {
        $image_path = $this->image ? $this->image->store('profile') : $this->temporaryImage;
        if (!str_starts_with($image_path, '/')) {
            $image_path = '/' . $image_path;
        }
        $updateProfile = DB::table('user')
            ->where('user.id', $this->userID)
            ->update(
                [
                    'username' => $this->username,
                    'address' => $this->address,
                    'phone_number' => $this->phone_number,
                    'image' => $image_path
                ]
            );

        if ($updateProfile) {
            $this->notification("success");
        } else {
            $this->notification("fail");
        }
    }
    public function cancel()
    {
        $this->isEdit = false;
    }
    public function showProfile()
    {
        $this->isEdit = false;
    }
    public function notification($status)
    {
        if ($status === "success") {
            $this->dispatch(
                "update_profile_success",
                type: "success",
                title: "Sukses",
                text: "Update Profile Berhasil!!",
                position: "center",
                timer: 2000
            );
            $this->cancel();
        } else if ($status === "fail") {
            $this->dispatch(
                "update_profile_fail",
                type: "error",
                title: "Error",
                text: "Gagal Update Profile!!",
                position: "center",
                timer: 2000
            );
        }
    }
}
