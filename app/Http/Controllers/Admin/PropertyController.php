<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Admin/Property/Index',
            [
                'properties' => Property::orderBy('created_at', 'desc')->paginate(10),
            ],

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Admin/Property/Create',
            [
                'property' => new Property(),
                'options' => Option::pluck('name', 'id'),
            ],
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));

        return redirect()->route('admin.property.index')->with('success', 'Property created successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return inertia(
            'Admin/Property/Edit',
            [
                'property' => $property,
                'options' => Option::pluck('name', 'id'),
                'selectedOptions' => $property->options->pluck('id')->toArray(),
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {   
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));

        return redirect()->route('admin.property.index')->with('success', 'Property updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'Property deleted.');
    }
}
