<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];

    public function users()
    {
        return $this->hasMany(User::class);
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
        $this->users()->delete();
        $this->delete();
    }
}
