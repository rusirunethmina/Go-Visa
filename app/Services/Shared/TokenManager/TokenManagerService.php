<?php

namespace App\Services\Shared\TokenManager;

use App\Models\TokenManager;

class TokenManagerService
{
  
    public function getAll()
    {
        return TokenManager::orderBy('id', 'desc')->get();
    }
    
    public function getById($id)
    {
        return TokenManager::find($id);
    }

    public function getByUserId($user_id, $name)
    {
        return TokenManager::where('user_id', $user_id)->where('name', $name)->first();
    }

    public function create($data)
    {
        return TokenManager::create($data);
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
