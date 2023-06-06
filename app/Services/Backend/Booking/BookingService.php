<?php

namespace App\Services\Backend\Booking;

use App\Models\BookingDetail;
use App\Models\BookingTimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function getById($id)
    {
        return BookingDetail::find($id);
    }

    public function getDatatable($data, $datatables)
    {
        $bookings = BookingDetail::query()->with('agent')->with('bookedUser')->with('timeSlot');
        if (isset($data['start_date']) and ! empty($data['start_date']) and ! isset($data['end_date'])) {
            $bookings = $bookings->whereDate('created_at', '>=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and ! empty($data['end_date']) and ! isset($data['start_date'])) {
            $bookings = $bookings->whereDate('created_at', '<=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and isset($data['start_date']) and !empty($data['end_date']) and !empty($data['start_date'])) {
            $bookings = $bookings->whereBetween(DB::raw('DATE(created_at)'), [Carbon::parse($data['start_date']), Carbon::parse($data['end_date'])]);
        }

        if (isset($data['status']) and !empty($data['status'])) {
            $bookings = $bookings->where('status', $data['status']);
        }
        return $datatables::of($bookings)
        ->addColumn('provider', function ($row) {
            return $row->agent->name;
        })
        ->addColumn('user', function ($row) {
            return  $row->bookedUser->name;
        })
        ->editColumn('created_at', function ($row) {
            return Carbon::parse($row->created_at)->format('Y-m-d');
        })
        ->make(true);
    }

    public function update($id, $data)
    {
        $booking = $this->getById($id);
        $booking->update($data);
        return  $booking;
    }

    public function delete($id)
    {
        $booking = $this->getById($id);
        return $booking->delete();
    }
}
