<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }
    
    public function index()
    {
        $properties = Property::mostRecent()->withoutSold()->limit(4)->get();
        return inertia(
            'Index/Index',
            [
                'properties' => $properties,
            ],
        );
    }
}
