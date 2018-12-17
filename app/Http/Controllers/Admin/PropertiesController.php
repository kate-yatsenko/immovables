<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', ['properties'=>$properties]);
    }

    public function create()
    {
        return view('admin.properties.create');

    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['title' => 'required' ]);
        Property::add($request->all());
        return redirect()->route('properties.index');
    }


    public function edit($id)
    {
        $property = Property::find($id);
        return view('admin.properties.edit', compact('property'));
    }


    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        $this->validate($request,
            ['title' => 'required' ]);
        $property->edit($request->all());
        return redirect()->route('properties.index');
    }

    public function destroy($id)
    {
        Property::find($id)->remove();
    }
}
