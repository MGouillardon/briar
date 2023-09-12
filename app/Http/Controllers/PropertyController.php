<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
    }

    public function show(Property $property)
    {
        return Inertia(
            'Property/Show',
            [
                'property' => $property
            ]
        );
    }
}
