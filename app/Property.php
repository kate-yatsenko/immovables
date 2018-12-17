<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    protected $fillable =['title'];

    public function properties()
    {
        return $this->belongsToMany(
            Construction::class,
            'properties_constructions',
            'property_id',
            'construction_id'
        );
    }


    public static function add($fields)
    {
        $property = new self;
        $property->fill($fields);
        $property->save();
        return $property;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        $this->removeRelations();
        $this->delete();
    }

    private function removeRelations(){
        DB::table('properties_constructions')->where('property_id', $this->id)->delete();
    }
}
