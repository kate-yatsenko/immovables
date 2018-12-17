<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\District;

use Faker\Provider\fa_IR\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('admin.districts.index', ['districts'=>$districts]);
    }

    public function create()
    {
        $cities = City::pluck('title', 'id')->all();
        return view('admin.districts.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  =>  'required'
        ]);
        $district = District::add($request->all());
        $district->setCity($request->get('city_id'));

        return redirect()->route('districts.index');
    }

    public function edit($id)
    {
        $district = District::find($id);
        $cities = City::pluck('title', 'id');

        return view('admin.districts.edit', compact('district', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'  =>  'required'
        ]);
        $district = District::find($id);
        $district->edit($request->all());
        $district->setCity($request->get('city_id'));

        return redirect()->route('districts.index');
    }

    public function destroy($id)
    {
        District::find($id)->remove();
    }
}
