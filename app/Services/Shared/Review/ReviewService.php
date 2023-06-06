<?php

namespace App\Services\Shared\Review;

use App\Models\Review;

class ReviewService
{
    public function getAll()
    {
        return Review::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return Review::find($id);
    }

    public function getByProvider($id)
    {
        return Review::where('provider_id', $id)->orderBy('id', 'desc')->get();
    }

    public function hasReviewed($provider_id, $user_id){
        return Review::where('provider_id', $provider_id)->where('user_id', $user_id)->first();
    } 

    public function create($data)
    {
        return Review::create($data);
    }

    public function update($id, $data)
    {
        $review = $this->getById($id);
        return $review->update($data);
    }

    public function delete($id)
    {
        $review = $this->getById($id);
        return $review->delete();
    }
}
