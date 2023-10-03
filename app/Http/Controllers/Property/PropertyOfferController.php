<?php

namespace App\Http\Controllers\Property;

use App\Models\Offer;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Notifications\OfferMade;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOfferRequest;

class PropertyOfferController extends Controller
{
    public function store(Property $property, PropertyOfferRequest $request)
    {
        $this->authorize('view', $property);
        $offer = $property->offers()->save(
            Offer::make(
                $request->validated()
            )
                ->bidder()->associate(
                    $request->user()
                )
        );
        $property->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with('success', 'Offer sent successfully');
    }
}
