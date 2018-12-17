<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', ['cities'=>$cities]);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['title' => 'required' ]);
        City::add($request->all());
        return redirect()->route('cities.index');
    }


    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $this->validate($request,
            ['title' => 'required' ]);
        $city->edit($request->all());
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        City::find($id)->remove();
    }
}


