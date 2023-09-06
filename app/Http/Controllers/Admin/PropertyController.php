<?php

namespace App\Http\Controllers\Admin;

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
            ],
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        Property::create($request->validated());

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
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {   
        $property->update($request->validated());

        return redirect()->route('admin.property.index')->with('success', 'Property updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
