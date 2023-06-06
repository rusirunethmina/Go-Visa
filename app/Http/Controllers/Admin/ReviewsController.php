<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Yajra\Datatables\Datatables;
use App\Services\Backend\Review\ReviewService;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    use AuthTrait;

    public function index()
    {
        $current_user = $this->getCurrentUser();
        return view('backend.reviews.index', ['current_user' => $current_user]);
    }

    public function datatable(Request $request, ReviewService $reviewService, Datatables $datatables)
    {
        $data = $request->all();
        return $reviewService->getDatatable($data, $datatables);
    }

    public function edit($id, ReviewService $reviewService)
    {
        $review = $reviewService->getById($id);
        return view('backend.reviews.edit', ['review' => $review]);
    }

    public function update($id, Request $request, ReviewService $reviewService)
    {
        try {
            $data = $request->all();
            $review = $reviewService->update($id, $data);
            return redirect()->back()->with('success', 'Review has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }

    public function delete($id, ReviewService $reviewService)
    {
        try {
            $review = $reviewService->delete($id);
            return $this->sendResponse('success', 'Review has been deleted successfully', $review, 200);
        } catch (\Exception $exception) {
            return $this->sendResponse('error', $exception->getMessage(), null, 400);
        }
    }
}
