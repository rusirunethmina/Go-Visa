<?php

namespace App\Services\Backend\Review;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewService
{
    public function getById($id)
    {
        return Review::find($id);
    }

    public function getDatatable($data, $datatables)
    {
        $reviews = Review::query()->with('provider')->with('user');
        if (isset($data['start_date']) and ! empty($data['start_date']) and ! isset($data['end_date'])) {
            $reviews = $reviews->whereDate('created_at', '>=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and ! empty($data['end_date']) and ! isset($data['start_date'])) {
            $reviews = $reviews->whereDate('created_at', '<=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and isset($data['start_date']) and !empty($data['end_date']) and !empty($data['start_date'])) {
            $reviews = $reviews->whereBetween(DB::raw('DATE(created_at)'), [Carbon::parse($data['start_date']), Carbon::parse($data['end_date'])]);
        }

        if (isset($data['status']) and !empty($data['status'])) {
            $reviews = $reviews->where('status', $data['status']);
        }
        return $datatables::of($reviews)
        ->addColumn('provider', function ($row) {
            return $row->provider->name;
        })
        ->addColumn('user', function ($row) {
            return  $row->user->name;
        })
        ->editColumn('created_at', function ($row) {
            return Carbon::parse($row->created_at)->format('Y-m-d');
        })
        ->make(true);
    }

    public function update($id, $data)
    {
        $review = $this->getById($id);
        $review->update($data);
        return  $review;
    }

    public function delete($id)
    {
        $review = $this->getById($id);
        return $review->delete();
    }
}
