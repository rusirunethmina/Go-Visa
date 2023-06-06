<?php

namespace App\Services\Shared\Booking;

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

    public function getDatatable($user_id, $data, $datatables, $is_provider)
    {
        $bookings = BookingDetail::query()->with('agent')->with('bookedUser')->with('timeSlot');
        if ($is_provider) {
            $bookings->where('agent_id', $user_id);
        } else {
            $bookings->where('booked_user_id', $user_id);
        }

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
        ->addColumn('name', function ($row) use ($is_provider) {
            $name = '';
            if ($is_provider) {
                $name = $row->bookedUser->name;
            } else {
                $name = $row->agent->name;
            }
            return $name;
        })
        ->editColumn('created_at', function ($row) {
            return Carbon::parse($row->created_at)->format('Y-m-d');
        })
        ->make(true);
    }

    /**
     * Get available time slots by day for the given agent user id and date.
     *
     * @param int $agentUserId
     * @param string $date
     * @return array
     */
    public function getAvailableTimeSlotsByDay(int $agentUserId, string $date): array
    {
        $bookedTimeSlotsArr = BookingDetail::where('agent_id', $agentUserId)
            ->where('booked_date', date('Y-m-d', strtotime($date)))->pluck('time_slot_id')
            ->toArray();

        $timeSlots = BookingTimeSlot::whereNotIn('id', $bookedTimeSlotsArr)->get();

        return $this->processTimeSlotsData($timeSlots);
    }


    /**
     * Process the given array of time slots data and return as an array.
     *
     * @param $allArr
     * @return array
     */
    protected function processTimeSlotsData($allArr): array
    {
        $respArr = [];

        foreach ($allArr as $timeSlot) {
            $formattedStartTime = date('h:i A', strtotime($timeSlot['start_time']));
            $formattedEndTime = date('h:i A', strtotime($timeSlot['end_time']));
            $tmp = [];
            $tmp['id'] = $timeSlot['id'];
            $tmp['label'] = $formattedStartTime.' - '.$formattedEndTime;
            $respArr[] = $tmp;
        }

        return $respArr;
    }


    public function confirmBooking($data)
    {
        return BookingDetail::create([
            'agent_id' => (int)$data['agent_id'],
            'booked_user_id' => Auth::user()->id,
            'booked_date' => date('Y-m-d', strtotime($data['date'])),
            'time_slot_id' => (int)$data['time_slot_id'],
        ]);
    }

    public function update($id, $data)
    {
        $booking = $this->getById($id);
        $booking->update($data);
        return  $booking;
    }
}
