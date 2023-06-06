<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Services\Shared\Testimonial\TestimonialService;
use App\Services\Shared\Format\FormatService;
use App\Http\Requests\Frontend\Testimonial\UpdateTestimonialRequest;

class TestimonialController extends Controller
{

    use AuthTrait;
    
    private $testimonialService;
    private $formatService;

    public function __construct(TestimonialService $testimonialService, FormatService $formatService)
    {
        $this->testimonialService = $testimonialService;
        $this->formatService = $formatService;
    }

    public function index()
    {
        $testimonials = $this->testimonialService->getAll();
        return view('backend.testimonials.index', ['testimonials' => $testimonials]);
    }
    
    public function edit($id)
    {
        $testimonial = $this->testimonialService->getById($id);
        return view('backend.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update($id, UpdateTestimonialRequest $request)
    {
        $data = $request->validated();
        try {
            if (isset($data['is_featured'])) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }
            $data['thumbnail'] = $this->formatService->getYoutubeThumbnail($data['link']);
            $testimonial = $this->testimonialService->update($id, $data);
            return redirect()->back()->with('success', 'Testimonial has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }


    public function delete($id)
    {
        try {
            $testimonial = $this->testimonialService->delete($id);
            return $this->sendResponse('success', 'Testimonial has been deleted successfully', $testimonial, 200);
        } catch (\Exception $exception) {
            return $this->sendResponse('error', "Something Went wrong, please try again later", null, 400);
        }
    }
}
