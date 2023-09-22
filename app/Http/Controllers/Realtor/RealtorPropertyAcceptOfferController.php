<?php

namespace App\Http\Controllers\Realtor;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RealtorPropertyAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $offer->update([
            'accepted_at' => now(),
        ]);
        $offer->property->offers()->except($offer)->update([
            'rejected_at' => now(),
        ]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted!, other offers rejected.");
    }
}
