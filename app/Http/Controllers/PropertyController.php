<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia(
            'Property/Index',
            [
                'properties' => Property::orderBy('created_at', 'desc')->paginate(12),
            ]
        );
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
