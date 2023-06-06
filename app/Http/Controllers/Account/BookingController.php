<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Services\Shared\Booking\BookingService;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Enums\User\UserRole;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingStatusUpdated;

class BookingController extends Controller
{

    use AuthTrait;

    public function __construct()
    {
    }

    public function index()
    {
        $current_user = $this->getCurrentUser();
        $data = compact('current_user');
        $views = collect();
        if ($this->hasProviderRole($current_user->role)) {
            $role_data = [];
            $profile = $current_user->profile;
            $role_data = compact('profile');
            $data = array_merge($data, $role_data);
            $view = 'frontend.account.booking.provider.index';
            $views->push($view);
        } else {
            $role_data = [];
            $profile = $current_user->profile;
            $role_data = compact('profile');
            $data = array_merge($data, $role_data);
            $view = 'frontend.account.booking.default.index';
            $views->push($view);
        }

        return view()->first($views->toArray())->with($data);
    }

    public function updateStatus($id, Request $request, BookingService $bookingService)
    {
        try {
            $data = $request->all();
            $currentUserRole = auth()->user()->role;
            if ($currentUserRole == UserRole::User) {
                $status = 'pending';
                $booking =  $bookingService->getById($id);
                if ($booking->status == 'pending') {
                    $status = 'cancelled';
                }
                $data['status'] = $status;
            }
            $booking = $bookingService->update($id, $data);
            // if($currentUserRole ==  UserRole::Provider){
            //     Mail::to($booking->bookedUser)->send(new BookingStatusUpdated($booking));
            // }else{
            //     Mail::to($booking->agent)->send(new BookingStatusUpdated($booking));
            // }
            return $this->sendResponse('success', 'Booking has been deleted successfully', $booking, 200);
        } catch (\Exception $exception) {
            return $this->sendResponse('error', $exception->getMessage(), null, 400);
        }
    }

    public function getDatatable(Request $request, BookingService $bookingService, Datatables $datatables)
    {
        $data = $request->all();
        $user_id = auth()->user()->id;
        $is_provider = (auth()->user()->role == "provider") ?  true : false;
        return $bookingService->getDatatable($user_id, $data, $datatables, $is_provider);
    }
}
