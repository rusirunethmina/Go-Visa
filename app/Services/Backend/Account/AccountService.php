<?php

namespace App\Services\Backend\Account;

use App\Models\User;
use App\Enums\User\UserStatus;
use App\Enums\User\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountService
{
  
    public function getById($id)
    {
        return User::find($id);
    }

    public function getDatatable($data, $datatables)
    {
        $users = User::query();
        if (isset($data['start_date']) and ! empty($data['start_date']) and ! isset($data['end_date'])) {
            $users = $users->whereDate('created_at', '>=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and ! empty($data['end_date']) and ! isset($data['start_date'])) {
            $users = $users->whereDate('created_at', '<=', Carbon::parse($data['end_date']));
        }

        if (isset($data['end_date']) and isset($data['start_date']) and !empty($data['end_date']) and !empty($data['start_date'])) {
            $users = $users->whereBetween(DB::raw('DATE(created_at)'), [Carbon::parse($data['start_date']), Carbon::parse($data['end_date'])]);
        }

        if (isset($data['status']) and !empty($data['status'])) {
            $users = $users->where('status', $data['status']);
        }
        return $datatables::of($users)
        ->editColumn('created_at', function ($row) {
            return Carbon::parse($row->created_at)->format('Y-m-d');
        })
        ->make(true);
    }

    public function update($id, $data)
    {
        $user = $this->getById($id);
        $user->update($data);
        return  $user;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}
