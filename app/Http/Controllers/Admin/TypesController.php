<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TypesController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', ['types'=>$types]);
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['title' => 'required' ]);
        Type::add($request->all());
        return redirect()->route('types.index');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $this->validate($request,
            ['title' => 'required' ]);
        $type->edit($request->all());
        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        Type::find($id)->remove();
    }
}
