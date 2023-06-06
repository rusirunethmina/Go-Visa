<?php

namespace App\Http\Controllers;

use App\Models\BookingTimeSlot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\Frontend\Account\AccountService;
use App\Services\Shared\Location\LocationService;
use App\Services\Shared\Review\ReviewService;
use App\Services\Shared\Booking\BookingService;
use App\Services\Frontend\Analytic\AnalyticService;
use App\Http\Requests\Frontend\Review\CreateReviewRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCreated;
use Auth;

class HomeController extends Controller
{
    private $accountService;
    private $locationService;
    private $bookingService;

    public function __construct(AccountService $accountService, LocationService $locationService, BookingService $bookingService)
    {
        $this->accountService = $accountService;
        $this->locationService = $locationService;
        $this->bookingService = $bookingService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mostRecommendedProviders = $this->accountService->getMostRecommendedProviders();
        $mostRecommendedProviders2 = $this->accountService->getMostRecommendedProviders();
        $mostRecommendedProviders3 = $this->accountService->getMostRecommendedProviders();
        $data = compact('mostRecommendedProviders', 'mostRecommendedProviders2', 'mostRecommendedProviders3');
        return view('frontend.guest.home')->with($data);
    }


    /**
     * Display the search results page with a list of users matching the search query.
     * @param Request $request
     * @return View
     */
    public function getSearch(Request $request)
    {
        $data = $request->all();
        $providers = $this->accountService->getSearch($data);
        $locations = $this->locationService->getAll();
        return view('frontend.guest.search', ['locations' => $locations, 'providers' => $providers]);
    }


    /**
     * Display the profile view for a given user based on their slug.
     * @param $slug|string
     * @return View
     */
    public function getProfile($slug, ReviewService $reviewService, AnalyticService $analyticService)
    {
        $has_reviewed = false;
        $provider = $this->accountService->getUserBySlug($slug);
        $relevantProviders = $this->accountService->getRelevantProvidersByLocation($provider->profile->location_id);
        $reviews = $reviewService->getByProvider($provider->id);
        if (Auth::check()) {
            if ($provider->id != auth()->user()->id) {
                $analyticService->track($provider->id, auth()->user()->id);
                $hasReviewed = $reviewService->hasReviewed($provider->id, auth()->user()->id);
                if($hasReviewed){
                    $has_reviewed = true;
                }
            }
        }
       
        return view('frontend.guest.profile', ['account' => $provider, 'relevantProviders' => $relevantProviders, 'reviews' => $reviews, 'has_reviewed' => $has_reviewed]);
    }

    public function getByCategory(Request $request, $category)
    {
        $providers = $this->accountService->getProvidersByCategory($category);
        $locations = $this->locationService->getAll();
        $slug = $this->accountService->categoryFormat($category);
        return view('frontend.guest.category', ['providers' => $providers, 'slug' => $slug, 'locations' => $locations]);
    }

    public function getContactUsPage()
    {
        return view('frontend.guest.contact');
    }

    public function getAvailableTimeSlotsByDay(Request $request): array
    {
        return $this->bookingService->getAvailableTimeSlotsByDay($request['agent_id'], $request['date']);
    }

    public function createReview(CreateReviewRequest $request, ReviewService $reviewService)
    {
        $data = $request->validated();
        try {
            $data['user_id'] =  auth()->user()->id;
            $review =$reviewService->create($data);
            return $this->sendResponse('success', 'Review has been created successfully', $review, 200);
        } catch (\Exception $exception) {
            dd( $exception);
            return $this->sendResponse('error', 'Something went wrong, please try again later.', null, 400);
        }
    }

    public function confirmBooking(Request $request): RedirectResponse
    {
        $booking = $this->bookingService->confirmBooking($request->all());
        if (isset($booking)) {
            //Mail::to($booking->agent)->send(new BookingCreated($booking));
            return redirect()->back()->with('success', 'Booking has been created successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }
}
