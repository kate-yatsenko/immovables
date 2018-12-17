<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\City;
use App\Construction;
use App\ConstructionProperty;
use App\District;
use App\Image;
use App\Property;
use App\Repository\ConstructionPropertyRepository;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;

//use Request;

class ConstructionsController extends Controller
{
    public function index()
    {
        $constructions = Construction::all();
        return view('admin.constructions.index', ['constructions'=>$constructions]);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $types = Type::pluck('title', 'id')->all();
        $cities = City::pluck('title', 'id')->all();
        $districts = District::pluck('title', 'id', 'city_id')->all();
        $properties = Property::pluck('title', 'id')->all();
        return view('admin.constructions.create', compact('categories','properties', 'cities', 'districts', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description'  =>  'required',
            'city' => 'required'
        ]);

        $construction = Construction::add($request->all());
        $construction->setCategory($request->get('category_id'));
        $construction->setType($request->get('type_id'));
        $construction->setCity($request->get('city'));
        $construction->setDistrict($request->get('district'));
        $construction->toggleIntermediary($request->get('is_intermediary'));
        Image::uploadImage($request->file('files'), $construction->id);
        ConstructionPropertyRepository::factory()->saveProperty($construction,$request->get('property',[]));
        return redirect()->route('constructions.index');
    }

    public function edit(Construction $construction)
    {
        $properties = ConstructionProperty::where('construction_id',$construction->id)->with('property')->get();
        $propertiesUseless = Property::whereNotIn('id',$properties->pluck('property_id'))->get()->pluck('title', 'id');
        $categories = Category::pluck('title', 'id')->all();
        $types = Type::pluck('title', 'id')->all();
        $cities = City::pluck('title', 'id')->all();
        $districts = $construction->city->districts->pluck('title', 'id', 'city_id')->all();
        return view('admin.constructions.edit',compact('properties','construction','propertiesUseless', 'categories', 'cities', 'districts', 'types'));
    }

    public function update(Request $request, Construction $construction)
    {
        $this->validate($request, [
            'description'  =>  'required',
            'city' => 'required'
        ]);
        $construction = Construction::find($construction->id);
        $construction->edit($request->all());
        $construction->setCategory($request->get('category_id'));
        $construction->setType($request->get('type_id'));
        $construction->setCity($request->get('city'));
        $construction->setDistrict($request->get('district'));
        $construction->toggleIntermediary($request->get('is_intermediary'));
        Image::uploadImage($request->file('files'), $construction->id);
        ConstructionPropertyRepository::factory()->saveProperty($construction,$request->get('property',[]));

        return redirect()->route('constructions.index');
    }

    public function destroy($id)
    {
        Construction::find($id)->remove();
    }

    public function createProp(){
        return view('admin.constructions.property');
    }

//    public function savePlus(Request $request)
//    {
//        Session::put('menu_active',$request->get('is_active',0));
//    }
}
