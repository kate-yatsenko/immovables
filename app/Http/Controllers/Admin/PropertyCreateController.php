<?php

namespace App\Http\Controllers\Admin;

use App\Construction;
use App\ConstructionProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class PropertyCreateController extends Controller
{
    public function createPropInCreate()
    {
        return view('admin.constructions.propertyInCreate');
    }
    public function storeProp(Request $request){
        $this->validate($request,
            ['title' => 'required' ]);
        Property::add($request->all());
        return redirect()->back();
    }

    public function createPropInEdit($id)
    {
        $construction = Construction::find($id);
        return view('admin.constructions.propertyInEdit', compact('construction'));
    }

    public function deleteRelations($consts_id, $prop_constr_id){
        ConstructionProperty::find($prop_constr_id)->delete();
    }


}
