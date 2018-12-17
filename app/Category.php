<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function constructions() {
        return $this->hasMany(Construction::class);
    }

    public static function add($fields)
    {
        $category = new self;
        $category->fill($fields);
        $category->save();
        return $category;
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
}
