<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['title'];

    public function constructions() {
        return $this->hasMany(Construction::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }

    public static function add($fields)
    {
        $city = new self;
        $city->fill($fields);
        $city->save();
        return $city;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        foreach($this->districts as $district){
            $district->remove();
        }
        $this->delete();
    }
}
