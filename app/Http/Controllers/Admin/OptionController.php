<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Admin/Option/Index',
            [
                'options' => Option::paginate(10),
            ],

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Admin/Option/Create',
            [
                'option' => new Option(),
            ],
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());

        return redirect()->route('admin.option.index')->with('success', 'Option created successfuly.');
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
    public function edit(Option $option)
    {
        return inertia(
            'Admin/Option/Edit',
            [
                'option' => $option,
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {   
        $option->update($request->validated());

        return redirect()->route('admin.option.index')->with('success', 'Option updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();

        return redirect()->route('admin.option.index')->with('success', 'Option deleted.');
    }
}
