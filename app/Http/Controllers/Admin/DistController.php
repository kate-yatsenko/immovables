<?php

namespace App\Http\Controllers\Admin;

use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistController extends Controller
{
    public function getDistCreate($id)
    {
        $dist = District::all()->where("city_id", $id)->pluck("title", "id");
        return json_encode($dist);
    }
    public function getDistEdit($constr_id, $id)
    {
        $dist = District::all()->where("city_id", $id)->pluck("title", "id");
        return json_encode($dist);
    }

}
