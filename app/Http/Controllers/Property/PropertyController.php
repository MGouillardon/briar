<?php

namespace App\Http\Controllers\Property;

use Inertia\Inertia;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

    public function index()
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
        $property->load(['images']);
        $offer = !Auth::user() ? null : $property->offers()->CurrentUser()->first();
        return Inertia(
            'Property/Show',
            [
                'property' => $property,
                'offerMade' => $offer,
                'options' => $property->options->pluck('name', 'id')->toArray(),
            ]
        );
    }
}
