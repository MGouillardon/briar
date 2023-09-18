<?php

namespace App\Http\Controllers\Realtor;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RealtorPropertyImageController extends Controller
{
    public function create(Property $property)
    {
        $property->load(['images']);
        return Inertia(
            'Realtor/PropertyImage/Create',
            [
                'property' => $property
            ]
        );
    }

    public function store(Property $property, Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                $property->images()->save(
                    new PropertyImage(
                        [
                            'filename' => $path
                        ]
                    )
                );
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully');
    }

    public function destroy(PropertyImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
