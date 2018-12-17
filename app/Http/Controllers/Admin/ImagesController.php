<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function destroy($constr_id, $img_id){
        Image::find($img_id)->removeImage();
        Image::find($img_id)->delete();
    }
}
