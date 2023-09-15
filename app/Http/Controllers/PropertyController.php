<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $filters = request()->only([
            'price_from', 'price_to', 'bedrooms', 'rooms', 'floor', 'area_from', 'area_to'
        ]);
        return Inertia(
            'Property/Index',
            [
                'filters' => $filters,
                'properties' => Property::mostRecent()
                ->filter($filters)
                ->paginate(12)
                ->withQueryString()
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