<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable=['title'];

    public function constructions() {
        return $this->hasMany(Construction::class);
    }

    public static function add($fields)
    {
        $type = new self;
        $type->fill($fields);
        $type->save();
        return $type;
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
