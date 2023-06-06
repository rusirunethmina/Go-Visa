<?php

namespace App\Services\Shared\Testimonial;

use App\Models\Testimonial;

class TestimonialService
{
  
    public function getAll()
    {
        return Testimonial::orderBy('id', 'desc')->get();
    }
    
    public function getById($id)
    {
        return Testimonial::find($id);
    }

    public function create($data)
    {
        return Testimonial::create($data);
    }

    public function update($id, $data)
    {
        $testimonial = $this->getById($id);
        $testimonial->update($data);
        return  $testimonial;
    }

    public function delete($id)
    {
        $testimonial = $this->getById($id);
        return $testimonial->delete();
    }
}
