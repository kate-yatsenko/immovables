<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Image extends Model
{
    public function construction(){
        return $this->belongsTo(Construction::class);
    }

    public static function uploadImage($files, $id)
    {
        if($files == null){return;}
        foreach($files as $file) {
            $image = new self;
            $filename = str_random(10) . '.' . $file->extension();
            $file->storeAs('uploads', $filename);
            $image->construction_id = $id;
            $image->image = $filename;
            $image->save();
        }
    }

    public function removeImage()
    {
            Storage::delete('uploads/' . $this->image);
    }
}
