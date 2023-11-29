<?php

namespace App\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $productID;

    // post Review
    public $rating;
    public $comment;
    public $editID;
    public $isEdit = false;

    public function render()
    {
        return view(
            'livewire.store.product-detail',
            [
                "products" => DB::table('product')
                    ->select('product.name', 'product.price', 'product.description', 'product_category.name AS category', 'product.image')
                    ->join('product_category', 'product.category_id', '=', 'product_category.id')
                    ->where('product.id', $this->productID)
                    ->first(),
                "productRating" => DB::table('review')
                    ->where('product_id', $this->productID)
                    ->select(DB::raw('COUNT(*) as total_review'), DB::raw('ROUND(AVG(rating), 1) as average_rating'))
                    ->first(),
                'barRating' => $this->getRating(),
                "reviews" => DB::table('review')
                    ->select('review.id', 'user.username', 'user.email', 'user.image', 'review.rating', 'review.comment', 'review.user_id',  'review.created_at', 'review.updated_at')
                    ->join('user', 'review.user_id', '=', 'user.id')
                    ->where('product_id', $this->productID)
                    ->get()
            ]
        );
    }

    public function getRating()
    {
        $ratings = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingCount = DB::table('review')
                ->where('review.product_id', $this->productID)
                ->where('review.rating', $i)
                ->count();
            $ratings[$i] = $ratingCount;
        }
        return $ratings;
    }

    public function mount($id)
    {
        $this->productID = $id;
    }

    public function handleSubmitReview()
    {
        $this->validate(
            [
                'rating' => 'required',
                'comment' => 'required',
            ]
        );

        $createReview = DB::table('review')->insert(
            [
                'product_id' => $this->productID,
                'user_id' => Auth::user()->id,
                'rating' => $this->rating,
                'comment' => $this->comment
            ]
        );
        if ($createReview) {
            $this->dispatch(
                "create_review_success",
                type: "success",
                title: "Sukses",
                text: "Ulasan Berhasil Dibuat",
                position: "center",
                timer: 2000
            );
            $this->reset(
                [
                    'comment',
                    'rating'
                ]
            );
        }
    }

    public function handleDeleteReview($id)
    {
        $deleteReview = DB::table('review')->where('review.id', $id)->delete();
        if ($deleteReview) {
            $this->dispatch(
                "delete_review_success",
                type: "success",
                title: "Sukses",
                text: "Ulasan Berhasil Dihapus",
                position: "center",
                timer: 2000
            );
        }
    }

    public function handleEditReview($id)
    {
        $this->editID = $id;
        $this->isEdit = !$this->isEdit;
        $editValue = DB::table('review')->select('review.comment', 'review.rating')->where('review.id', $id)->first();
        if (!$this->isEdit) {
            $this->reset(['comment', 'rating']);
        }
        $this->comment = $editValue->comment;
        $this->rating = $editValue->rating;
    }


    public function handlePostReview($id)
    {
        $this->validate(
            [
                'rating' => 'required',
                'comment' => 'required',
            ]
        );

        $updateReview = DB::table('review')
            ->where('review.id', $id)
            ->update(
                [
                    'rating' => $this->rating,
                    'comment' => $this->comment
                ]
            );

        if ($updateReview) {
            $this->dispatch(
                "update_review_success",
                type: "success",
                title: "Sukses",
                text: "Ulasan Berhasil Di Edit",
                position: "center",
                timer: 2000
            );
            $this->reset(['comment', 'rating']);
            $this->isEdit = false;
        }
    }
}
