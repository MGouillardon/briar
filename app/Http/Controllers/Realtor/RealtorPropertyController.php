<?php

namespace App\Http\Controllers\Realtor;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PropertyFormRequest;

class RealtorPropertyController extends Controller
{

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only([
                'by', 'order'
            ])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'properties' => Auth::user()
                    ->properties()
                    ->filter($filters)
                    ->withCount('images')
                    ->withCount('offers')
                    ->paginate(5)
                    ->withQueryString()
            ]
        );
    }

    public function show(Property $property)
    {
        return inertia(
            'Realtor/Show',
            [
                'property' => $property->load('offers', 'offers.bidder'),
            ]
        );
    }

    public function create()
    {
        return inertia(

            'Realtor/Create',
            [
                'property' => new Property(),
                'options' => Option::pluck('name', 'id'),
            ],
        );
    }

    public function store(PropertyFormRequest $request)
    {
        $property = $request->user()->properties()->create(
            $request->validated()
        );
        $property->options()->sync($request->validated('options'));


        return redirect()->route('realtor.property.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        return inertia(

            'Realtor/Edit',
            [
                'property' => $property,
                'options' => Option::pluck('name', 'id'),
                'selectedOptions' => $property->options->pluck('id')->toArray(),
            ],
        );
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));

        return redirect()->route('realtor.property.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Property deleted successfully.');
    }

    public function restore(Property $property)
    {
        $property->restore();

        return redirect()
            ->back()
            ->with('success', 'Property restored successfully.');
    }
}
