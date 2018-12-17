<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['title'];

    public function constructions() {
        return $this->hasMany(Construction::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public static function add($fields)
    {
        $district = new self;
        $district->fill($fields);
        $district->save();
        return $district;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        foreach($this->constructions as $construction){
            $construction->remove();
        }
        $this->delete();
    }

    public function setCity($id)
    {
        if ($id == null) {
            return;
        }
        $this->city_id = $id;
        $this->save();
    }

    public function getCityTitle()
    {
        return $this->city->title;
    }

    public function getCityId(){
        return $this->city!=null ? $this->city->id : null;
    }
}
