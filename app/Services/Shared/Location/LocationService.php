<?php

namespace App\Services\Shared\Location;

use App\Models\Location;

class LocationService
{
  
    public function getAll()
    {
        return Location::all();
    }
}
