<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Yajra\Datatables\Datatables;
use App\Services\Backend\Account\AccountService;
use App\Http\Requests\Frontend\Profile\UpdateProviderProfileRequest;
use Illuminate\Http\Request;
use App\Services\Shared\File\FileServiceInterface;
use App\Services\Shared\Language\LanguageService;
use App\Services\Shared\Location\LocationService;

class UserController extends Controller
{

    use AuthTrait;

    private $accountService;
    private $fileService;

    public function __construct(AccountService $accountService, FileServiceInterface $fileService)
    {
        $this->accountService = $accountService;
        $this->fileService = $fileService;
    }

    public function index()
    {
        $current_user = $this->getCurrentUser();
        return view('backend.users.index', ['current_user' => $current_user]);
    }

    public function datatable(Request $request, Datatables $datatables)
    {
        $data = $request->all();
        return $this->accountService->getDatatable($data, $datatables);
    }

    public function edit($id, LanguageService $languageService, LocationService $locationService)
    {
        $profile = $this->accountService->getByid($id);
        return view('backend.users.edit', ['profile' => $profile]);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        try {
            if(isset($data['is_featured'])){
                $data['is_featured'] = 1;
            }else{
                $data['is_featured'] = 0;
            }
            $this->accountService->update($id, $data);
            return redirect()->back()->with('success', 'User has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }
}
