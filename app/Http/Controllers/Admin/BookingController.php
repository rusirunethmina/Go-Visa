<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use App\Services\Backend\Booking\BookingService;
use Yajra\Datatables\Datatables;

class BookingController extends Controller
{

    use AuthTrait;

    public function index()
    {
        $current_user = $this->getCurrentUser();
        return view('backend.booking.index', ['current_user' => $current_user]);
    }

    public function datatable(Request $request, BookingService $bookingService, Datatables $datatables)
    {
        $data = $request->all();
        return $bookingService->getDatatable($data, $datatables);
    }

    public function update($id, Request $request, BookingService $bookingService)
    {
        try {
            $data = $request->all();
            $booking = $bookingService->update($id, $data);
            return $this->sendResponse('success', 'Booking has been updated successfully', $booking, 200);
        } catch (\Exception $exception) {
            return $this->sendResponse('error', $exception->getMessage(), null, 400);
        }
    }

    public function delete($id, BookingService $bookingService)
    {
        try {
            $booking = $bookingService->delete($id);
            return $this->sendResponse('success', 'Booking has been deleted successfully', $booking, 200);
        } catch (\Exception $exception) {
            return $this->sendResponse('error', $exception->getMessage(), null, 400);
        }
    }
}
