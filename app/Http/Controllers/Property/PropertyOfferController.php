<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOfferRequest;
use App\Models\Offer;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyOfferController extends Controller
{
    public function store(Property $property, PropertyOfferRequest $request)
    {
        $this->authorize('view', $property);
        $property->offers()->save(
            Offer::make(
                $request->validated()
            )
                ->bidder()->associate(
                    $request->user()
                )
        );
        return redirect()->back()->with('success', 'Offer sent successfully');
    }
}
